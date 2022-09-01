function fetchCat() {
  $.ajax({
    type: "post",
    url: "/php/categoryList.php",
    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    dataType: "JSON",
    async: true,
    success: function (data) {
      if (data.success == true) {
        let tableData = "";
        category = data.data;
        for (let key in category) {
          tableData += "<tr>";
          tableData += `<td>${category[key].id}</td>`;
          tableData += `<td>${category[key].category}</td>`;
          tableData += `<td><div class="d-flex justify-content-around">
                    <button type="button" id="updateBtn" class="btn btn-primary" data-toggle="modal" onclick="Edit(${category[key].id})"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button type="button" class="btn btn-danger" onclick="Delete(${category[key].id})"><i class="fa-solid fa-trash-can"></i></button>
                    </div></td>`;
          tableData += "</tr>";
        }
        $("#categoryData").html(tableData);
        $("#categoryTable").DataTable();
      } else {
        let tableData = `<tr><td colspan="3" style="width:100%;text-align:center;">No Data</td></tr>`;
        $("#categoryData").html(tableData);
        console.log(data.message);
      }
    },
  });
}

function Edit(id) {
  $.ajax({
    type: "post",
    url: "/php/categoryInfo.php",
    data: { id: id },
    dataType: "JSON",
    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    async: true,
    success: function (data) {
      if (data.success == true) {
        $("#category").val(data.data.category);
        window.catId = data.data.id;
        $("#updateModal").modal("toggle");
      } else {
        console.log(data.message);
      }
    },
  });
}

function Delete(id) {
  $.ajax({
    type: "post",
    url: "/php/deleteCategory.php",
    data: {
      id: id,
    },
    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    dataType: "JSON",
    async: true,
    success: function (data) {
      if (data.success == true) {
        let tableData = "";
        $("#tabledata").html(tableData);
        fetchCat();
      } else {
        console.log(data.message);
      }
    },
  });
}

$(document).ready(() => {
  fetchCat();

  $("#closeX").click(()=>{
    $("#updateModal").modal("toggle");
  });

  $("#colseBtn").click(()=>{
    $("#updateModal").modal("toggle");
  });

  $("#add").click((e) => {
    e.preventDefault();
    if ($("#category").val() == "") {
      $("#error").css("display", "block");
      $("#error").text("Category required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    } else {
      $.ajax({
        type: "post",
        data: {
          category: $("#category").val(),
        },
        url: "/php/addcategory.php",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        async: true,
        success: function (data) {
          if (data.success == true) {
            $(location).attr("href", "categories.php");
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

  $("#updateCategory").click((e) => {
    e.preventDefault();
    if ($("#category").val() == "") {
      $("#error").css("display", "block");
      $("#error").text("Category Required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    } else {
      $.ajax({
        type: "post",
        data: {
          id: window.catId,
          category: $("#category").val(),
        },
        url: "/php/updateCategory.php",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        async: true,
        success: function (data) {
          if (data.success == true) {
            $("#updateModal").modal("toggle");
            fetchCat();
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
