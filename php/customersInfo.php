<?php

include_once "connection.php";

$id = $_POST['id'];

if(empty($id)){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"ID Not Found!")); 
}else{
    $query = "SELECT * FROM `users` WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    $customerInfo = mysqli_fetch_assoc($result);

    if(empty($customerInfo)){
        echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Customer Not Found!")); 
    }else{
        echo json_encode(array('success'=>true,'data'=>$customerInfo, 'message'=>"Customer Info Fetch Successfully!")); 
    }
}

?>