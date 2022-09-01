$(document).ready(() => {
  // $(".side-menu").addClass("reduce-size");
  // $("#sidebar-menu").addClass("close-side-menu");
  // $("#logo").addClass("logo");
  localStorage["slider"] = 1;
  if ($(window).width() <= 768  ||  $(window).width() <= 480) {
  } else {
    if (localStorage["slider"] == 1) {
      $(".side-menu").addClass("reduce-size");
      $("#sidebar-menu").addClass("close-side-menu");
      $("#logo").addClass("logo");
      localStorage["slider"] = 0;
    } else {
      $(".side-menu").removeClass("reduce-size");
      $("#sidebar-menu").removeClass("close-side-menu");
      $("#logo").removeClass("logo");
      localStorage["slider"] = 1;
    }
  }

  if (localStorage["slider"] == 1) {
    $(".side-menu").removeClass("reduce-size");
    $("#sidebar-menu").removeClass("close-side-menu");
    $("#logo").removeClass("logo");
  }

  $("#close-menu").click(() => {
    if ($(window).width() <= 768  ||  $(window).width() <= 480) {
      $("#sidebar-menu").removeClass("show-menu-in-mobile");
      console.log(2);
    }
  });

  $("#menu-btn").click(() => {
    if ($(window).width() <= 768  ||  $(window).width() <= 480) {
      $("#sidebar-menu").addClass("show-menu-in-mobile");
      console.log(1);
    } else {
      if (localStorage["slider"] == 1) {
        $(".side-menu").addClass("reduce-size");
        $("#sidebar-menu").addClass("close-side-menu");
        $("#logo").addClass("logo");
        localStorage["slider"] = 0;
      } else {
        $(".side-menu").removeClass("reduce-size");
        $("#sidebar-menu").removeClass("close-side-menu");
        $("#logo").removeClass("logo");
        localStorage["slider"] = 1;
      }
    }
  });

  $("#account-of-admin").click(() => {
    $("#dropDown").slideToggle();
  });

  $("#newCatPage").click((e) => {
    e.preventDefault();
    $(location).attr("href", "addCategory.php");
  });

  $("#newProducts").click((e) => {
    e.preventDefault();
    $(location).attr("href", "addProduct.php");
  });

  let file = $(location).attr("pathname").split("/");
  option = $("#menu-option  li");
  for (let key in option) {
    if ($(option[key]).children().attr("href") == file[file.length - 1]) {
      $(option[key]).children().addClass("active");
    }
    if (key == 7) {
      return;
    }
  }
});

function logOut() {
  $.ajax({
    type: "post",
    url: "/php/logout.php",
    dataType: "JSON",
    async: false,
    success: function (data) {
      if (data.success == true) {
        location.reload(true);
      } else {
        console.log(data.message);
      }
    },
  });
}

// function slider(){
//   $('#sidebar-menu').addClass('close-side-menu');
//   $('.side-menu').addClass('reduce-size');
// }
