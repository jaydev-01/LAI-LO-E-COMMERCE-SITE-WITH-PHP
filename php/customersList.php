<?php

include_once "connection.php";

$query ="SELECT * FROM users WHERE type = 0";

$result = mysqli_query($connection, $query);

$customers = array();
while ($row = mysqli_fetch_assoc($result)) {
$customers[] = $row;
}


if(empty($customers)){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Data Not Found")); 
}else{
    echo json_encode(array('success'=>true,'data'=>$customers, 'message'=>"Data Fetch Successfully!"));
}

?>