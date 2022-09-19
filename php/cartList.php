<?php
include_once "connection.php";

$query ="SELECT * FROM cart WHERE customerid =  $customerid ";

$result = mysqli_query($connection, $query);

$categories =  mysqli_fetch_assoc($result);

if(empty($categories)){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Data Not Found")); 
}else{
    echo json_encode(array('success'=>true,'data'=>$categories, 'message'=>"Data Fetch Successfully!"));
}
?>
