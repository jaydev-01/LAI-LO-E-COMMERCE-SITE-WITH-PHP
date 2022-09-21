function fetchOrder() {
  $.ajax({
    type: "post",
    url: "/php/orderList.php",
    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    dataType: "JSON",
    async: true,
    success: function (data) {
      if (data.success == true) {
        let tableData = " ";
        orders = data.data;
        for (let key in orders) {
          tableData += "<tr>";
          tableData += `<td>${orders[key].id}</td>`;
          tableData += `<td><img src ="/php/uploads/${orders[key].productImage}" width="100px" height="100px" /></td>`;
          tableData += `<td>${orders[key].customersId}</td>`;
          tableData += `<td>${orders[key].productName}</td>`;
          tableData += `<td>${orders[key].price}</td>`;
          tableData += `<td>${orders[key].unit}</td>`;
          tableData += `<td>${orders[key].category}</td>`;
          tableData += `<td>${orders[key].orderDate}</td>`;
          tableData += `<td>${orders[key].deliveryDate}</td>`;
          tableData += `<td align="center">${orders[key].delivered == 0 ? '<i class="fa-solid fa-clock text-danger"></i>':'<i class="fa-solid fa-badge-check text-success"></i>'}</td>`;  
          tableData += `<td>${orders[key].customerEmail}</td>`;
          tableData += `<td>${orders[key].fname}</td>`;
          tableData += `<td>${orders[key].lname}</td>`;
          tableData += `<td>${orders[key].address}</td>`;
          tableData += `<td>${orders[key].city}</td>`;
          tableData += `<td>${orders[key].state}</td>`;
          tableData += `<td>${orders[key].country}</td>`;
          tableData += `<td>${orders[key].phoneno}</td>`;
          tableData += `<td>${orders[key].totalAmount}</td>`;
          tableData += "</tr>";
        }
        $("#orderData").html(tableData);
        $("#orderTable").DataTable();
        console.log(123);
      } else {
        let tableData = `<tr><td colspan="3" style="width:100%;text-align:center;">No Data</td></tr>`;
        $("#orderData").html(tableData);
        $("#orderTable").DataTable();
        console.log(data.message);
      }
    },
  });
}

$(document).ready(()=>{
    fetchOrder();
})
