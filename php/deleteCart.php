<?php

include_once "connection.php";

$cartId = $_POST['cartId'];
$customerId = $_COOKIE['user'];

$query = "DELETE FROM `cart` WHERE id = '" . $cartId . "'";

$result = mysqli_query($connection, $query);

if($result){
    // $quary = "SELECT SUM(quantity) AS Qunt FROM cart WHERE customerid = '" . $customerId . "'";
    // $result = mysqli_query($connection, $quary);
    // $resultInArray = mysqli_fetch_array($result);
    echo json_encode(array('success'=>true,'data'=>null, 'message'=>"Delet SuccessFully"));
}else{
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error In Delting"));
}
?>