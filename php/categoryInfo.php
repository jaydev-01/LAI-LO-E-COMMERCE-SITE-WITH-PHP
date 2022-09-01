<?php

include_once "connection.php";

$id = $_POST['id'];

if(empty($id)){
    echo json_encode(array("success"=>false, 'data'=>null, "message"=>"Id Not Found!"));
}else{
    $query ="SELECT * FROM categories WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    $categoryInfo = mysqli_fetch_assoc($result);

    if(empty($categoryInfo)){
        echo json_encode(array("success"=>false, 'data'=>null, "message"=>"Category Not Found"));
    }else{
        echo json_encode(array("success"=>true, 'data'=>$categoryInfo, "message"=>"category found successfully!"));
    }
}


?>