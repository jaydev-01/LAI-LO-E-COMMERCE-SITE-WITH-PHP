function fetchCustomers() {
  $.ajax({
    type: "post",
    url: "/php/customersList.php",
    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    dataType: "JSON",
    async: true,
    success: function (data) {
      if (data.success == true) {
        let tableData = " ";
        customers = data.data;
        for (let key in customers) {
          tableData += "<tr>";
          tableData += `<td>${customers[key].id}</td>`;
          tableData += `<td>${customers[key].name}</td>`;
          tableData += `<td>${customers[key].email}</td>`;
          tableData += `<td><div class="d-flex justify-content-around">
                    <button type="button" class="btn btn-primary" onclick="Edit(${customers[key].id})"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button type="button" class="btn btn-danger" onclick="Delete(${customers[key].id})"><i class="fa-solid fa-trash-can"></i></button>
                    </div></td>`;
          tableData += "</tr>";
        }
        $("#customerData").html(tableData);
        $("#customerTable").DataTable();
        console.log(123);
      } else {
        let tableData = `<tr><td colspan="3" style="width:100%;text-align:center;">No Data</td></tr>`;
        $("#customerData").html(tableData);
        $("#customerTable").DataTable();
        console.log(data.message);
      }
    },
  });
}

function Edit(id) {
  $.ajax({
    type: "post",
    url: "/php/customersInfo.php",
    data: { id: id },
    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    dataType: "JSON",
    async: true,
    success: function (data) {
      if (data.success == true) {
        $("#customerName").val(data.data.name);
        $("#customerEmail").val(data.data.email);
        window.custId = data.data.id;
        $("#updateCustomersModal").modal("toggle");
      } else {
        console.log(data.message);
      }
    },
  });
}

function Delete(id) {
  $.ajax({
    type: "post",
    url: "/php/deleteCustomers.php",
    data: {
      id: id,
    },
    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    dataType: "JSON",
    async: true,
    success: function (data) {
      if (data.success == true) {
        fetchCustomers();
      } else {
        console.log(data.message);
      }
    },
  });
}

$(document).ready(() => {
  fetchCustomers();

  $("#closeX").click(() => {
    $("#updateCustomersModal").modal("toggle");
  });

  $("#colseBtn").click(() => {
    $("#updateCustomersModal").modal("toggle");
  });

  $("#updateCustomer").click((e) => {
    e.preventDefault();

    if ($("#customerName").val() == "") {
      $("#error").css("display", "block");
      $("#error").text("Name Required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    } else if ($("#customerEmail").val() == "") {
      $("#error").css("display", "block");
      $("#error").text("Email Required!");
      setTimeout(() => {
        $("#error").css("display", "none");
      }, 2000);
    } else {
      $.ajax({
        type: "post",
        url: "/php/updateCustomers.php",
        data: {
          id: window.custId,
          name: $("#customerName").val(),
          email: $("#customerEmail").val(),
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        async: true,
        success: function (data) {
          if (data.success == true) {
            $("#updateCustomersModal").modal("toggle");
            fetchCustomers();
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
