<?php

include_once "connection.php";

$cartId = $_POST['cartId'];
$customerId = $_COOKIE['user'];

$query = "SELECT quantity FROM likedproduct WHERE id = '" . $cartId . "'";
$result = mysqli_query($connection, $query);
$beforeQ = mysqli_fetch_array($result);
$a = $beforeQ['quantity'] - 1;


$query = "UPDATE `likedproduct` SET `quantity`='$a' WHERE id = '" . $cartId . "'";

$result = mysqli_query($connection, $query);

if($result){
    // $quary = "SELECT SUM(quantity) AS Qunt FROM likedproduct WHERE customerid = '" . $customerId . "'";
    // $result = mysqli_query($connection, $quary);
    // $resultInArray = mysqli_fetch_array($result);
    echo json_encode(array('success'=>true,'data'=>null, 'message'=>"Delet SuccessFully"));
}else{
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error In Delting"));
}
?>