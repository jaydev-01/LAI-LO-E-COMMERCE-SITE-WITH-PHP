<?php

include_once "connection.php";

$customerId = $_COOKIE['user'];

$quary = "SELECT SUM(quantity) AS Qunt FROM cart WHERE customerid = '" . $customerId . "'";
$result = mysqli_query($connection, $quary);
$resultInArray = mysqli_fetch_array($result);

if(empty($resultInArray)){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error in Count Cart Item!"));
}else{
    echo json_encode(array('success'=>true,'data'=>$resultInArray['Qunt'], 'message'=>"Total Cart!"));
}

?>