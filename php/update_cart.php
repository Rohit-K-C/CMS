<?php

include "../php/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemId = $_POST['item_id'];
    $newQuantity = $_POST['quantity'];
    $query = "UPDATE cart SET quantity = $newQuantity WHERE id = $itemId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Cart item updated successfully')
                window.location.href='my_cart.php';
                </script>";
    } else {
        echo "<script>alert('Error Updating Cart Item')
                window.location.href='my_cart.php';
                </script>";
    }
}
