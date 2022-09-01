<?php

include_once "connection.php";

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

if(empty($id)){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"ID Not Found!"));
}else if(empty($name)){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Name Not Found!"));
}else if(empty($email)){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Email Not Found!"));
}else{
    $query = "UPDATE `users` SET `name`='$name',`email`='$email' WHERE id = '$id'";
    $result = mysqli_query($connection, $query);

    if($result == 1){
        echo json_encode(array('success'=>true,'data'=>null, 'message'=>"Customer Detail updated Successfully!"));
    }else{
        echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Customers Detail Not Updated!"));
    }

}

?>