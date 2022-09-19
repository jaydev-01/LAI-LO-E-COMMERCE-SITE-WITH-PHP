$(document).ready(() => {

  $("#signin").click((e) => {
    e.preventDefault();
    let flag = 0;

    if ($("#email").val() == "") {
      flag = 1;
      $("#error").css("display", "block");
      $("#error").text("Email Required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    }

    if ($("#password").val() == "") {
      flag = 1;
      $("#error").css("display", "block");
      $("#error").text("Password Required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    }

    if ($("#email").val() == "" && $("#password").val() == "") {
      flag = 1;
      $("#error").css("display", "block");
      $("#error").text("Email and Password Required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    }

    if (flag == 0) {
      $.ajax({
        type: "post",
        url: "/php/login.php",
        data: {
          email: $("#email").val(),
          password: $("#password").val(),
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        async: true,
        success: function (data) {
          if (data.success == true) {
            if(data.data.type == 1){
                $(location).attr("href", "/html/admin/dashboard.php");
            }else{
                $(location).attr("href", "/html/customers/home.php");
            }
            
          } else {
            $("#error").css("display", "block");
            $("#error").text(data.message);
            setTimeout(() => {
              $("#error").css("display", "none");
            }, 2000);
          }
        },
      });
    }
  });

  
});
