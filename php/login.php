<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="shortcut icon" href="/images/Logo.jpg">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body>
    <div class="loginbox">
        <div class="logoDiv">
            <img src="../images/loginImage.png" alt="">
        </div>
        <div class="formDiv">
            <form action="signin.php" method="post">
                <input type="text" name="username" id="username" placeholder="Enter Username">
                <input type="password" name="password" id="password" placeholder="Enter Password">
                <input type="submit" name="" value="LOGIN">

                <label id="register">Don't have an account? <a id="signup" href="signup.php">Register</a></label>
                
            </form>
        </div>
    </div>
</body>

</html>