<?php

include "../php/connection.php";
session_start();
$user_email = $_SESSION['email'];
$getId = mysqli_query($conn, "SELECT id FROM users WHERE email='$user_email'");
while ($row = mysqli_fetch_array($getId)) {
    $user_id = $row['id'];
}
$query = "SELECT * FROM cart WHERE user_id = '$user_id'";
$sql = mysqli_query($conn, $query);
$subtotal = 0;
while ($data = mysqli_fetch_array($sql)) {
    $id = $data['id'];
    $product_id = $data['product_id'];
    $image = $data['image'];
    $name = $data['name'];
    $quantity = $data['quantity'];
    $price = $data['price'];
    $subtotalItem = $price * $quantity;
    $subtotal += $subtotalItem;

    $sql = mysqli_query($conn, "INSERT INTO my_order (name, quantity, subtotal, product_id, user_email) VALUES  ('$name','$quantity','$subtotalItem','$product_id','$user_email')");

    $delete = mysqli_query($conn, "DELETE FROM cart WHERE id='$id'");

    if (!$delete) {
        echo "<script>alert('Failed to place order')
        window.location.href='checkout.php';
        </script>";
    } else {
        echo "<script>alert('Order Placed')
        window.location.href='checkout.php';
        </script>";
    }
}
