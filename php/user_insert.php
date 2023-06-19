<?php
include "../php/connection.php";

$name = $_POST['name'];
$address = $_POST['address'];
$number = $_POST['number'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = mysqli_query($conn,"INSERT INTO users (name,address,number,email,password,admin) values ('$name','$address','$number','$email','$password','0')");
if ($sql){
    echo "<script>alert('User Created');
    window.location.href='login.php';
    </script>";
}
?>
