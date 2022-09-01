function getProductsList() {
  $.ajax({
    type: "post",
    url: "/php/products.php",
    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    dataType: "JSON",
    async: true,
    success: function (data) {
      if (data.success == true) {
        let tableData = "";
        product = data.data;
        for (let key in product) {
          tableData += "<tr>";
          tableData += `<td>${product[key].id}</td>`;
          tableData += `<td><img src ="/php/uploads/${product[key].productImage}" width="100px" height="100px" /></td>`;
          tableData += `<td>${product[key].Name}</td>`;
          tableData += `<td>${product[key].price}</td>`;
          tableData += `<td>${product[key].category}</td>`;
          tableData += `<td>${product[key].quantity}</td>`;
          tableData += `<td>${product[key].description}</td>`;
          tableData += `<td>${product[key].discount}</td>`;
          tableData += `<td><div class="d-flex justify-content-between p-2">
                    <button type="button" id="updateBtn" class="btn btn-primary" onclick="Edit(${product[key].id})" data-toggle="modal" data-target="#updateModel"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button type="button" class="btn btn-danger" onclick="Delete(${product[key].id})"><i class="fa-solid fa-trash-can"></i></button>
                    </div></td>`;
          tableData += "</tr>";
        }
        $("#productData").html(tableData);
        $("#productTable").DataTable();
      } else {
        let tableData = `<tr><td colspan="9" style="width:100%;text-align:center;">No Data</td></tr>`;
        $("#productData").html(tableData);
        console.log(data.message);
      }
    },
  });
}

function Delete(id) {
  $.ajax({
    type: "post",
    url: "/php/deleteProduct.php",
    data: {
      id: id,
    },
    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    dataType: "JSON",
    async: true,
    success: function (data) {
      if (data.success == true) {
        $("#productData").html("");
        getProductsList();
      } else {
        console.log(data.message);
      }
    },
  });
}

function getCategory() {
  $.ajax({
    type: "post",
    url: "/php/categoryList.php",
    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    dataType: "JSON",
    success: function (data) {
      if (data.success == true) {
        let catOption = "";
        let categories = data.data;
        for (let key in categories) {
          catOption += `<option value="${categories[key].id}">${categories[key].category}</option>`;
        }
        $("#category").append(catOption);
      } else {
        console.log(data.message);
      }
    },
  });
}

function Edit(id) {
  $.ajax({
    type: "post",
    url: "/php/ProductInfo.php",
    data: { id: id },
    dataType: "JSON",
    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    async: true,
    success: function (data) {
      if (data.success == true) {
        window.imageName = data.data.productImage;
        $("#product").val(data.data.Name);
        $("#price").val(data.data.price);
        $("#category > option").each(function (option) {
          if (option.value == data.data.categoryId) {
            option.attr("selected", true);
          }
        });
        $("#description").val(data.data.description);
        $("#unit").val(data.data.quantity);
        $("#discount").val(data.data.discount);
        window.productId = data.data.id;
        $("#updateProductModal").modal("toggle");
      } else {
        console.log(data.message);
      }
    },
  });
}

$(document).ready(() => {
  getProductsList();

  getCategory();

  $("#closeX").click(() => {
    $("#updateProductModal").modal("toggle");
  });

  $("#colseBtn").click(() => {
    $("#updateProductModal").modal("toggle");
  });

  $("#addProduct").click((e) => {
    e.preventDefault();
    let flag = 0;

    if ($("#product").val() == "") {
      flag = 1;
      $("#error").css("display", "block");
      $("#error").text("Product Name required required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    } else if ($("#productImage").val() == "") {
      flag = 1;
      $("#error").css("display", "block");
      $("#error").text("Product Image required required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    } else if ($("#price").val() == "") {
      flag = 1;
      $("#error").css("display", "block");
      $("#error").text("Product Price required required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    } else if ($("#description").val() == "") {
      flag = 1;
      $("#error").css("display", "block");
      $("#error").text("Product Description required required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    } else if ($("#category").val() == 0) {
      flag = 1;
      $("#error").css("display", "block");
      $("#error").text("Product Category required required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    } else if ($("#unit").val() == "") {
      flag = 1;
      $("#error").css("display", "block");
      $("#error").text("Product Total Unit required required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    }

    if (flag == 0) {
      let formData = new FormData();
      formData.append("productName", $("#product").val());
      formData.append("productImage", $("#productImage")[0].files[0]);
      formData.append("productPrice", $("#price").val());
      formData.append("productDescription", $("#description").val());
      formData.append("productCategory", $("#category").val());
      formData.append("productUnit", $("#unit").val());
      formData.append("productDiscount", $("#discount").val());

      $.ajax({
        type: "post",
        url: "/php/addproduct.php",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "JSON",
        async: true,
        success: function (data) {
          if (data["success"] == true) {
            $(location).attr("href", "products.php");
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

  $("#updateProduct").click((e) => {
    e.preventDefault();
    let flag = 0;

    if ($("#product").val() == "") {
      flag = 1;
      $("#error").css("display", "block");
      $("#error").text("Product Name required required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    } else if ($("#price").val() == "") {
      flag = 1;
      $("#error").css("display", "block");
      $("#error").text("Product Price required required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    } else if ($("#description").val() == "") {
      flag = 1;
      $("#error").css("display", "block");
      $("#error").text("Product Description required required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    } else if ($("#category").val() == 0) {
      flag = 1;
      $("#error").css("display", "block");
      $("#error").text("Product Category required required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    } else if ($("#unit").val() == "") {
      flag = 1;
      $("#error").css("display", "block");
      $("#error").text("Product Total Unit required required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    }

    if (flag == 0) {
      let formData = new FormData();
      formData.append("productName", $("#product").val());
      // formData.append("productImage", $("#productImage")[0].files[0]);
      formData.append("productPrice", $("#price").val());
      formData.append("productDescription", $("#description").val());
      formData.append("productCategory", $("#category").val());
      formData.append("productUnit", $("#unit").val());
      formData.append("productDiscount", $("#discount").val());
      if ($("#productImage").val() == "") {
        formData.append("productImage", window.imageName);
        formData.append("file", "0");
      } else {
        formData.append("productImage", $("#productImage")[0].files[0]);
        formData.append("file", "1");
      }
      formData.append("productId", window.productId);
      

      $.ajax({
        type: "post",
        url: "/php/updateproduct.php",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "JSON",
        async: true,
        success: function (data) {
          if (data.success == true) {
            $("#updateProductModal").modal("toggle");
            getProductsList();
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
