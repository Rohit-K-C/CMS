<!DOCTYPE html>
<html>
    <head>
        <title>Login Form</title>
        <link rel="shortcut icon" href="/images/Logo.jpg">
        <!-- <link rel="stylesheet" type="text/css" href="login.css"> -->
    </head>
    <body>
        <div class="loginbox">
            <!-- <img src="../images/thumb.jpg" class="thumb"> -->
            <h1>Login Here</h1>
            <form action="signin.php" method="post">
                <p>Username</p>
                <input type="text" name="username" id="username" placeholder="Enter Username">
                <p>Password</p>
                <input type="password" name="password" id="password" placeholder="Enter Password">
                <input type="submit" name="" value="Login">
                <a href="signup.php">Signup</a>
            </form>
        </div>
    </body>
</html>