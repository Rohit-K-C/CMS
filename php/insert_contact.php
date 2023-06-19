<?php
include "../php/connection.php";

if (isset($_POST['submit'])) {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];



    $sql = mysqli_query($conn, "INSERT INTO contact_details (fName, lName, email, number, message) values ('$fName','$lName','$email','$number','$message')");
    if ($sql) {
        echo "<script>alert('Submitted');
        window.location.href='contactus.php';
        </script>";
    }
  
}
