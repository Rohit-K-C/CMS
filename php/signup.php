<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="shortcut icon" href="/images/Logo.jpg">
    <link rel="stylesheet" type="text/css" href="../css/signup.css">
</head>

<body>
    <div class="loginbox">
        <div class="logoDiv">
            <img src="../images/loginImage.png" alt="">
        </div>
        <div class="formDiv">
            <form action="user_insert.php" method="post">

                <input type="text" name="name" placeholder="Name"><br>
                <input type="text" name="address" placeholder="Address"><br>
                <input type="number" name="number" placeholder="Number"><br>
                <input type="email" name="email" placeholder="Email"><br>
                <input type="text" name="password" placeholder="Password"><br>
                <input type="submit" name="submit" value="Sign Up">
            </form>
        </div>
    </div>
</body>

</html>