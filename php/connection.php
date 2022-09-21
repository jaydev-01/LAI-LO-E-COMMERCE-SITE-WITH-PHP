<?php

$host = "sql203.epizy.com";
$username = "epiz_32638520";
$password = "10D8T3h8ouGSda5";
$db = "epiz_32638520_lailo";

$connection = mysqli_connect($host, $username, $password, $db);

if(mysqli_connect_errno()){
    echo "Error : " . mysqli_connect_errno();
}
// else{
//     echo "connection successfully!";
// }


?>