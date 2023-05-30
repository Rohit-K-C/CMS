<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <header>
        <div class="wrapper">
            <div class="logo">
                <h1><a href="../php/admin.php">Hongshi</a></h1>
            </div>
            <nav>
                <div class="nav_menu">
                    <a href="../php/admin.php" id="index">Home</a>
                    <a href="../php/add_product.php">Add Product</a>
                    <a href="../php/all.php">All Product</a>

                    <select class="dropdown" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                        <option value="none" selected>
                            <?php
                            session_start();
                            if ($_SESSION['name'] == null) {

                                echo "<script>alert('Please Login!')
                                    window.location.href='login.php';
                                    </script>";
                            }
                            echo $_SESSION['name'];
                            ?>
                        </option>
                        <option value="logout.php">Logout</option>
                    </select>
                </div>
            </nav>
        </div>
    </header>

</body>

</html>