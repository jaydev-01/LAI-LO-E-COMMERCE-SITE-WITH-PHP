<?php

include_once "connection.php";

$productId = $_POST['productId'];
$customerId = $_COOKIE['user'];

$query ="SELECT * FROM cart WHERE productId = '" . $productId . "' AND customerid = '" . $customerId . "'";

$result = mysqli_query($connection, $query);
$resultInArray = mysqli_fetch_array($result);

if(empty($resultInArray)){
    $quary = "INSERT INTO `cart`(`productId`, `quantity`, `customerid`) VALUES ('$productId','1','$customerId')";
    $result = mysqli_query($connection, $quary);
    // var_dump($result);
    if($result){
        $quary = "SELECT SUM(quantity) AS Qunt FROM cart WHERE customerid = '" . $customerId . "'";
        $result = mysqli_query($connection, $quary);
        $resultInArray = mysqli_fetch_array($result);
        // var_dump($resultInArray);
        echo json_encode(array('success'=>true,'data'=>$resultInArray['Qunt'], 'message'=>"Added into cart!"));
    }else{
        echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error in Adding into cart!"));
    }

}else{
    $cartId = $resultInArray['id'];
    $quntity =  $resultInArray['quantity'] + 1;
    $query = "UPDATE `cart` SET `quantity`='$quntity' WHERE id = $cartId";
    $result = mysqli_query($connection, $query);
    if($result){
        $quary = "SELECT SUM(quantity) AS Qunt FROM cart WHERE customerid = '" . $customerId . "'";
        $result = mysqli_query($connection, $quary);
        $resultInArray = mysqli_fetch_array($result);
        // var_dump($resultInArray);
        echo json_encode(array('success'=>true,'data'=>$resultInArray['Qunt'], 'message'=>"Added into cart!"));
    }else{
        echo json_encode(array('success'=>true,'data'=>null, 'message'=>"Error in Adding into cart!"));
    }
}

?>