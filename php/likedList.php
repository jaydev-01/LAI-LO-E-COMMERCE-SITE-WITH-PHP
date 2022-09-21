<?php
include_once "connection.php";

$customerid = $_COOKIE['user'];

$query ="SELECT c.*,p.Name,p.price,p.productImage FROM likedproduct c,products p  WHERE p.id = c.productId AND customerid = '" . $customerid . "'";

$result = mysqli_query($connection, $query);

// $categories =  mysqli_fetch_assoc($result);

$categories = array();
while ($row = mysqli_fetch_assoc($result)) {
$categories[] = $row;
}

// var_dump($categories);
if(empty($categories)){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Data Not Found")); 
}else{
    echo json_encode(array('success'=>true,'data'=>$categories, 'message'=>"Data Fetch Successfully!"));
}
?>
