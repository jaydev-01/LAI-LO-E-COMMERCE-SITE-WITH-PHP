<?php

include_once "connection.php";
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phoneno = $_POST['phoneno'];
$captcha = $_POST['captcha'];

if ($captcha == $_SESSION['captcha']) {
    $query = "SELECT * FROM users WHERE email = '" . $email . "'";

    $result = mysqli_query($connection, $query);
    $resultInArray = mysqli_fetch_array($result);

    // var_dump($resultInArray);
    if (empty($resultInArray)) {

        $query = "INSERT INTO `users`(`name`, `email`, `password`, `type`, `otp`, `phoneno`) VALUES ('$name','$email','$password','0','null','$phoneno')";
        $result = mysqli_query($connection, $query);
        // die($result);
        if ($result) {
            $cookie_name = "user";
            $cookie_value = $email;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            echo json_encode(array('success' => true, 'data' => null, 'message' => "Register Successfully"));
        } else {
            echo json_encode(array('success' => false, 'data' => null, 'message' => "Error in register!"));
        }
    } else {
        echo json_encode(array('success' => false, 'data' => null, 'message' => "User exist!"));
    }
} else {
    echo json_encode(array('success' => false, 'data' => null, 'message' => "Captcha is not Match"));
}

?>