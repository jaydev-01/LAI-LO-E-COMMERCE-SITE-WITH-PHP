<?php

include_once "connection.php";

$cartId = $_POST['cartId'];
$customerid = $_COOKIE['user'];

$query = "INSERT INTO `cart` (`productId`, `quantity`,`customerid`) SELECT `productId`, `quantity`,`customerid` FROM `likedproduct` WHERE id = '" . $cartId . "'";
$result = mysqli_query($connection, $query);

if($result){
    $query = "DELETE FROM `likedproduct` WHERE id = '" . $cartId . "'";
    $result = mysqli_query($connection, $query);
    if($result){
        echo json_encode(array('success'=>true,'data'=>null, 'message'=>"Delet SuccessFully"));
    }
    else{
        echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error In Delting liked product"));
    }
}else{
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error In adding to cart"));
}
?>