<?php

include_once "connection.php";


$id = $_POST['id'];


$query ="DELETE FROM `users` WHERE id = '". $id . "'";
$result = mysqli_query($connection, $query);


if(mysqli_errno($connection)){
    echo json_encode(array('success'=>true,'data'=>null, 'message'=>"Error in  Query "));  
}

if($result == 1){
    echo json_encode(array('success'=>true,'data'=>null, 'message'=>"Customer delete successfully!"));  
}else{ 
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error in Deleting Customer"));  
}

?>