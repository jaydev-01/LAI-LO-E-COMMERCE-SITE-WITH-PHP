$(document).ready(()=>{
    $.ajax({
        type: "post",
        url: "/php/dashboardData.php",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        async: true,
        success : function(data){
            if(data.success == true){
                $('#order').html(data.data.totalOrders[0]);
                $('#customers').html(data.data.totalCustomers[0]);
                $('#products').html(data.data.totalProducts[0]);
                $('#category').html(data.data.totalCategories[0]);
                console.log(data.data);
            }else{
                console.log(data.message);
            }
        }
    })
})