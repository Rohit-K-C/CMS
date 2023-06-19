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
            <form action="user_insert.php" method="post" onsubmit="return validateForm()">

                <input type="text" name="name" placeholder="Name"><br>
                <input type="text" name="address" placeholder="Address"><br>
                <input type="number" name="number" placeholder="Number"><br>
                <input type="email" name="email" placeholder="Email"><br>
                <input type="password" name="password" placeholder="Password"><br>
                <input type="submit" name="submit" value="Sign Up">
            </form>

            <script>
                function validateForm() {
                    var name = document.forms[0].name.value;
                    var address = document.forms[0].address.value;
                    var number = document.forms[0].number.value;
                    var email = document.forms[0].email.value;
                    var password = document.forms[0].password.value;

                    if (name === '') {
                        alert("Please enter your name.");
                        return false;
                    }

                    if (/\d/.test(name)) {
                        alert("Name should not contain numbers.");
                        return false;
                    }

                    if (address === '') {
                        alert("Please enter your address.");
                        return false;
                    }

                    if (isNaN(number) || number.length !== 10) {
                        alert("Please enter a valid 10-digit number.");
                        return false;
                    }

                    if (email === '') {
                        alert("Please enter your email.");
                        return false;
                    }

                    if (password === '') {
                        alert("Please enter your password.");
                        return false;
                    }

                    var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{6,}$/;
                    if (!passwordRegex.test(password)) {
                        alert("Password must be 6 characters or more, and contain at least one uppercase letter, one number, and one symbol.");
                        return false;
                    }

                    return true;
                }
            </script>


        </div>
    </div>
</body>

</html>