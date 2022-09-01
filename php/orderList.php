<?php

include_once "connection.php";

$query ="SELECT * FROM `orders` ORDER BY `orderDate`";

$result = mysqli_query($connection, $query);

$products = array();
while ($row = mysqli_fetch_assoc($result)) {
$cateId = $row['categoryId'];
$query ="SELECT * FROM categories WHERE id = '$cateId'";
$result1 = mysqli_query($connection, $query);
$cat = mysqli_fetch_assoc($result1);
if(empty($cat)){
    $row['category'] = null;
}else{
    $row['category'] = $cat['category'];
}

$products[] = $row;
}


if(empty($products)){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Data Not Found")); 
}else{
    echo json_encode(array('success'=>true,'data'=>$products, 'message'=>"Data Fetch Successfully!"));
}

?>