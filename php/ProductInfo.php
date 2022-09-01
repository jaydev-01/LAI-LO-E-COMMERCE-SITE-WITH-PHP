<?php

include_once "connection.php";

$id = $_POST['id'];

if(empty($id)){
    echo json_encode(array("success"=>false, 'data'=>null, "message"=>"Id Not Found!"));
}else{

    $query = "SELECT * FROM `products` WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    $productInfo = mysqli_fetch_assoc($result);

    if(empty($productInfo)){
        echo json_encode(array("success"=>false, 'data'=>null, "message"=>"Data Not Found!"));
    }else{
        echo json_encode(array("success"=>true, 'data'=>$productInfo, "message"=>"Data Not Found!"));
    }

}
