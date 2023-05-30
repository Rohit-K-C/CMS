<?php
//connection banauna lai
include "../php/connection.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $default = $_POST['default'];
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

    if($folder =='../images/' ){
        $finalImage = $default;

    }
    else{
        $finalImage = $folder;
    }
    $sql  = mysqli_query($conn, "UPDATE products SET name='$name', image='$finalImage',  category='$category', details='$details', quantity='$quantity', weight='$weight', manufacturer='$manufacturer', price='$price', date='now()' where id='$id'");
    if (!$sql) {
        echo "<script>alert('Failed to Update product')
        window.location.href='all.php';
        </script>";
    } else {
        echo "<script>alert('Product updated')
        window.location.href='all.php';
        </script>";
    }
}
