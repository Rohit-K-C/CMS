<?php
//connection banauna lai
include "../php/connection.php";



if (isset($_GET['id'])) {

    session_start();
    $product_id = $_GET['id'];
    $user_email = $_SESSION['email'];


    $retrieve_id = mysqli_query($conn, "SELECT id FROM users WHERE email='$user_email'");
    while ($row = mysqli_fetch_array($retrieve_id)) {

        $user_id = $row['id'];
    }

    $product_details = mysqli_query($conn, "SELECT * FROM products WHERE id='$product_id'");
    while ($row_details = mysqli_fetch_array($product_details)) {

        $id = $row_details['id'];
        $name = $row_details['name'];
        $image = $row_details['image'];
        $price = $row_details['price'];
    }


    $check_item = mysqli_query($conn, "SELECT COUNT(*) AS count FROM cart WHERE  product_id='$product_id'");
    if ($check_item) {
        $total = mysqli_fetch_assoc($check_item);
        $count = $total['count'];

        if ($count > 0) {
            $check_quantity = mysqli_query($conn, "SELECT quantity FROM cart WHERE user_id='$user_id' && product_id='$product_id'");
            while ($quantity_details = mysqli_fetch_array($check_quantity)) {
                $quantity = $quantity_details['quantity'];
            }

            $id = $row_details['id'];
            $quantity = $quantity + 1;

            $update_cart = mysqli_query($conn, "UPDATE cart SET quantity='$quantity' WHERE product_id='$product_id' && user_id='$user_id'");
            if (!$update_cart) {
                echo "<script>alert('Failed to add item')
                window.location.href='order_online.php';
                </script>";
            } else {
                echo "<script>alert('Item added to cart')
                window.location.href='order_online.php';
                </script>";
            }
        } else {
            $quantity = 1;
            $insert_cart  = mysqli_query($conn, "INSERT INTO cart (name, image, quantity, price, user_id, product_id) values ('$name','$image','$quantity',$price, $user_id, $product_id) ");
            if (!$insert_cart) {
                echo "<script>alert('Failed to add item')
                window.location.href='order_online.php';
                </script>";
            } else {
                echo "<script>alert('Item added to cart')
                window.location.href='order_online.php';
                </script>";
            }
        }
    }
}
