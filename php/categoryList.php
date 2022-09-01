<?php

include_once "connection.php";

$query ="SELECT * FROM categories";

$result = mysqli_query($connection, $query);

$categories = array();
while ($row = mysqli_fetch_assoc($result)) {
$categories[] = $row;
}


if(empty($categories)){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Data Not Found")); 
}else{
    echo json_encode(array('success'=>true,'data'=>$categories, 'message'=>"Data Fetch Successfully!"));
}

?>