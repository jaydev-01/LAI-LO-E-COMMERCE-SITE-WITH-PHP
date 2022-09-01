<?php

include_once "connection.php";

$file = $_POST['file'];
$flag = 0;

if ($file == 1) {
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt');
    $path = 'uploads/';

    $img = $_FILES['productImage']['name'];
    $tmp = $_FILES['productImage']['tmp_name'];

    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    $final_image = rand(1000, 1000000) . $img;
    if (in_array($ext, $valid_extensions)) {
        $path = $path . strtolower($final_image);

        if (move_uploaded_file($tmp, $path)) {
            $flag = 1;
        } else {
            echo json_encode(array('success' => false, 'data' => null, 'message' => "Error in image uplodation!"));
        }
    }
}

$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productDescription = $_POST['productDescription'];
$productCategory = $_POST['productCategory'];
$productUnit  = $_POST['productUnit'];
$productDiscount = $_POST['productDiscount'];
$id = $_POST['productId'];

if ($flag == 1) {
    $productImage = $final_image;
} else {
    $productImage = $_POST['productImage'];
}

$query = "UPDATE `products` SET `Name`='$productName',`categoryId`='$productCategory',`price`='$productPrice',`description`='$productDescription',`productImage`='$productImage',`quantity`='$productUnit',`discount`='$productDiscount' WHERE id = '$id'";
$newProduct = mysqli_query($connection, $query);

if (mysqli_errno($connection)) {
    echo json_encode(array('success' => false, 'data' => null, 'message' => "Error in Query"));
} else {
    if ($newProduct) {
        echo json_encode(array('success' => true, 'data' => null, 'message' => "Product added successfully"));
    } else {
        echo json_encode(array('success' => false, 'data' => null, 'message' => "Error in adding new Category"));
    }
}
