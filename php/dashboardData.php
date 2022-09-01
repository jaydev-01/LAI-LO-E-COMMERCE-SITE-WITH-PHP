<?php

include_once "connection.php";

$dashboardData = array();

$query = "SELECT COUNT(*) FROM orders where month(orderDate) = month(curdate())";
$result = mysqli_query($connection, $query);
$dashboardData['totalOrders'] = mysqli_fetch_all($result);

$query = "SELECT COUNT(*) FROM `users` WHERE type = 0";
$result = mysqli_query($connection, $query);
$dashboardData['totalCustomers'] = mysqli_fetch_all($result);

$query = "SELECT COUNT(*) FROM `products`";
$result = mysqli_query($connection, $query);
$dashboardData['totalProducts'] = mysqli_fetch_all($result);

$query = "SELECT COUNT(*) FROM `categories`";
$result = mysqli_query($connection, $query);
$dashboardData['totalCategories'] = mysqli_fetch_all($result);

if(empty($dashboardData)){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error Occured!" . mysqli_error($connection)));
}else{
    echo json_encode(array('success'=>true,'data'=>$dashboardData, 'message'=>"Data Fetch Successfully for dashboard!"));
}



?>