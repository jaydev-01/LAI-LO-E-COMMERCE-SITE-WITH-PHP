<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "lailo";

$connection = mysqli_connect($host, $username, $password, $db);

if(mysqli_connect_errno()){
    echo "Error : " . mysqli_connect_errno();
}
// else{
//     echo "connection successfully!";
// }


?>