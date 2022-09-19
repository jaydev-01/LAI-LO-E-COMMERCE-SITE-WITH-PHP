<?php

include_once "connection.php";
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$query ="SELECT * FROM users WHERE email = '" . $email . "' AND password = '" . $password . "'";

$result = mysqli_query($connection, $query);
$resultInArray = mysqli_fetch_array($result);

if(empty($resultInArray)){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Unkonwn user!")); 
}else{
    if($resultInArray['type'] == 1)
    {
        $_SESSION['user'] = $resultInArray;
    }
    else
    {
        $cookie_name = "user";
        $cookie_value = $email;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    }
    echo json_encode(array('success'=>true,'data'=>$resultInArray, 'message'=>"User login successfully!"));
}

?>