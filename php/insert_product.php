<?php
//connection banauna lai
include "../php/connection.php";

if (isset($_POST['submit'])) {

    $name = $_POST['product_name'];
    $category = $_POST['category'];
    $details = $_POST['details'];
    $quantity = $_POST['quantity'];
    $weight = $_POST['weight'];
    $manufacturer = $_POST['manufacturer'];
    $price = $_POST['price'];


    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
    $folder = "../images/".$filename;
    move_uploaded_file($tempname, $folder);

    $sql  = mysqli_query($conn, "INSERT INTO products (name, image, category, details, quantity, weight, manufacturer, price,  date) values ('$name','$folder','$category','$details','$quantity','$weight','$manufacturer',$price, now()) ");
    if (!$sql) {
        echo "<script>alert('Failed to Insert product')
        window.location.href='add_product.php';
        </script>";
    } else {
        echo "<script>alert('Product Inserted')
        window.location.href='add_product.php';
        </script>";
    }
}

?>