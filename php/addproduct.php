<?php

include_once "connection.php";

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); 
$path = 'uploads/';

$img = $_FILES['productImage']['name'];
$tmp = $_FILES['productImage']['tmp_name'];

$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
$final_image = rand(1000,1000000).$img;
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_image); 

if(move_uploaded_file($tmp,$path)) {

    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productImage = $final_image;
    $productDescription = $_POST['productDescription'];
    $productCategory = $_POST['productCategory'];
    $productUnit  = $_POST['productUnit'];
    $productDiscount = $_POST['productDiscount'];

    $query ="INSERT INTO `products`(`Name`, `categoryId`, `price`, `description`, `productImage`, `quantity`, `discount`) VALUES ('$productName','$productCategory','$productPrice','$productDescription','$productImage','$productUnit','$productDiscount')";
    $newProduct = mysqli_query($connection, $query);

    if(mysqli_errno($connection)){
        echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error in Query")); 
    }else{
        if($newProduct){
            echo json_encode(array('success'=>true,'data'=>null, 'message'=>"Product added successfully"));
        }else{
            echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error in adding new Category")); 
        }
    }
}else{
    echo json_encode(array('success'=>false,'data'=>null, 'message'=>"Error in image uplodation!"));
}
}

?>