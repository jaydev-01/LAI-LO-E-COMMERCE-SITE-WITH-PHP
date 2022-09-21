<?php

include_once "connection.php";
$customerId = $_COOKIE['user'];

$quary = "SELECT SUM(quantity) AS Qunt FROM cart WHERE customerid = '" . $customerId . "'";
$result = mysqli_query($connection, $quary);
$resultInArray = mysqli_fetch_array($result);

$quary = "SELECT SUM(quantity) AS Qunt FROM likedproduct WHERE customerid = '" . $customerId . "'";
$result1 = mysqli_query($connection, $quary);
$resultInArray1 = mysqli_fetch_array($result1);
// echo json_encode(array('success'=>true,'data'=>array('liked'=>$resultInArray['Qunt'],'cart'=>$resultInArray1['Qunt']), 'message'=>"Delet SuccessFully"));
if($resultInArray && $resultInArray1){
    echo json_encode(array('success'=>true,'data'=>array('liked'=>$resultInArray1['Qunt'],'cart'=>$resultInArray['Qunt']), 'message'=>"Delet SuccessFully"));
}else{
    echo json_encode(array('success'=>true,'data'=>null, 'message'=>"Error in counting"));
}
?>