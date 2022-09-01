<?php

include_once "connection.php";

$id = $_POST['id'];
$categoryName = $_POST['category'];

if(empty($id)){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"ID Not Found!"));
}else if(empty($categoryName)){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Category Not Found!"));
}else{
    $query ="UPDATE `categories` SET `category`='$categoryName' WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    if($result == 1){
        echo json_encode(array('success'=>true,'data'=>$result, 'message'=>"Category Updated Successfully!"));
    }else{
        echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Category Not Updated!"));
    }
}

?>