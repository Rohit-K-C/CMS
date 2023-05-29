<!DOCTYPE html>
<html>
    <head>
        <title>Login Form</title>
        <link rel="shortcut icon" href="image/Logo.jpg">
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
        <div class="loginbox">
            <img src="image/thumb.jpg" class="thumb">
            <h1>Login Here</h1>
            <form>
                <p>Username</p>
                <input type="text" name="" id="username" placeholder="Enter Username">
                <p>Password</p>
                <input type="password" name="" id="password" placeholder="Enter Password">
                <input type="submit" name="" value="Login" onclick="login()">
            </form>
        </div>
        <script>
            function login(){
                var Username = document.getElementById("username").value;
                var Password = document.getElementById("password").value;
                if(Username=="dristishakya" && Password=="dristi123"){
                    window.location.assign("home.html");
                    alert("Login Successful");
                }
                else{
                    alert("Invalid Information");
                    return;
                }
            }
        </script>
    </body>
</html>