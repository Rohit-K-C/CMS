<?php
include "../php/connection.php";

$username = $_POST['username'];
$password = $_POST['password'];


$sql = mysqli_query($conn, "SELECT COUNT(1) FROM users where email='$username' AND password='$password'");

$row = mysqli_fetch_row($sql);
if ($row[0] > 0) {

    session_start();
    $sess = mysqli_query($conn, "SELECT name from users WHERE email='$username' AND password='$password'");
    while ($sess1 = mysqli_fetch_array($sess)) {
        //$sess1 vaneko variable j rakhda ni hunxa
        //$sess1['username vankeo table ko column name']
        $name = $sess1['name'];

        $_SESSION['name'] = $name;
    }


    $sql1 = mysqli_query($conn, "SELECT admin from users WHERE email='$username' AND password='$password'");

    while ($row1 = mysqli_fetch_array($sql1)) {
        $admin = $row1['admin'];
        echo $admin;
    }
    if ($admin == '1') {
        header("Location: admin.php");
        exit();
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    echo "<script>alert('Invalid Credential')
    window.location.href='login.php';
    </script>";
}
