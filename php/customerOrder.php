<?php

include_once "connection.php";

$customerId = $_COOKIE['user'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$phoneno = $_POST['phoneno'];
$email = $_POST['email'];

$query = "SELECT * FROM cart c, products p WHERE c.productId = p.id AND customerid = '" . $customerId . "'";
$result = mysqli_query($connection, $query);
// $result1 = 0;
while ($row = mysqli_fetch_assoc($result)) {
//    var_dump($row);
//    die();
   $pname = $row['Name'];
   $pprice = $row['price'];
   $pid = $row['productId'];
   $unit = $row['quantity'];
   $pimage = $row['productImage'];
   $pcatid = $row['categoryId'];
   $totalAmount = $pprice * $unit;

   $query = "INSERT INTO `orders`(`customersId`, `productId`, `productName`, `price`, 
                         `unit`, `orderDate`, `deliveryDate`, `productImage`, `customerEmail`, 
                         `categoryId`, `delivered`, `fname`, `lname`, `address`, `city`, `state`,
                          `country`, `phoneno`, `totalAmount`) 
                          VALUES ('$customerId','$pid',' $pname','$pprice','$unit',SYSDATE(),
                          DATE_ADD(SYSDATE(), INTERVAL 7 DAY),'$pimage','$email','$pcatid','0','$fname','$lname',
                          '$address','$city','$state','$country','$phoneno','$totalAmount')";

    $result1 = mysqli_query($connection, $query);

}

if($result1){
    $query = "DELETE FROM `cart` WHERE customerid = '" . $customerId . "'";
    $result = mysqli_query($connection, $query);

    if($result){
        echo json_encode(array('success'=>true,'data'=>null, 'message'=>"Order Successfully"));
    }
    else{
        echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error in deleteing cart"));
    }
}else{
    // die(mysqli_errno($connection));
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error in ordering"));
}


