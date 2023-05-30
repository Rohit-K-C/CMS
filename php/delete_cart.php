<?php
include "../php/connection.php";
$id = $_GET['user_id'];
$sql = mysqli_query($conn, "DELETE FROM cart WHERE id='$id'");
if (!$sql) {
    echo "<script>
                window.location.href='my_cart.php';
                </script>";
} else {
    echo "<script>
                window.location.href='my_cart.php';
                </script>";
}
