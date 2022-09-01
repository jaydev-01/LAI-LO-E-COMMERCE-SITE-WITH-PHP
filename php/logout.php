<?php
session_start();

unset($_SESSION["user"]);

if(isset($_SESSION["user"])){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error in  Logout"));
}else{
    echo json_encode(array('success'=>true,'data'=>null, 'message'=>"Logout successfully!"));
}
?>