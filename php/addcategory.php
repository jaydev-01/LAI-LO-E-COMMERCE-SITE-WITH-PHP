<?php

include_once "connection.php";

$category = $_POST['category'];

$query ="INSERT INTO categories (category) VALUES ('$category')";
$newUser = mysqli_query($connection, $query);

if(mysqli_errno($connection)){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error in Query")); 
}else{
    if($newUser){
        echo json_encode(array('success'=>true,'data'=>null, 'message'=>"Category added successfully"));
    }else{
        echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error in adding new Category")); 
    }
    
}

?>