<?php

setcookie('user', null, -1, '/'); 

if(isset($_COOKIE['user'])){
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error in  Logout"));
}else{
    echo json_encode(array('success'=>true,'data'=>null, 'message'=>"Logout successfully!"));
}

?>