<?php

include_once "connection.php";

$category = $_POST['category'];

if($category == 0){
    $query = "SELECT * FROM products";
}else{
    $query = "SELECT * FROM `products` WHERE categoryId = '" . $category . "'";
}

$result = mysqli_query($connection, $query);

$productList = array();
while ($row = mysqli_fetch_assoc($result)) {
$productList[] = $row;
}

if(empty($productList)){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error in fetching product"));
}else{
    echo json_encode(array('success'=>true,'data'=>$productList, 'message'=>"Data Fetch Successfully!"));
}

?>