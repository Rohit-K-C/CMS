<?php

include "../php/connection.php";
session_start();
$user_email = $_SESSION['email'];
$getId = mysqli_query($conn, "SELECT id FROM users WHERE email='$user_email'");
while ($row = mysqli_fetch_array($getId)) {
    $user_id = $row['id'];
}

if (isset($_GET['check'])) {

    $check_details = json_decode(urldecode($_GET['check']), true);
    foreach ($check_details as $details) {
        list($name, $quantity, $subtotalItem, $product_id) = $details;


        $sql = mysqli_query($conn, "INSERT INTO my_order (name, quantity, subtotal, product_id, user_email) VALUES  ('$name','$quantity','$subtotalItem','$product_id','$user_email')");
        $delete = mysqli_query($conn, "DELETE FROM cart WHERE user_id='$user_id' AND product_id='$product_id'");

        if (!$sql) {
            echo "<script>alert('Failed to place order')
        window.location.href='checkout.php';
        </script>";
        } else {
            echo "<script>alert('Order Placed')
        window.location.href='checkout.php';
        </script>";
        }
    }
}
