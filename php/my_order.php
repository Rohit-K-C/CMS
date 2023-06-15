<!DOCTYPE html>
<html>

<head>
    <title>Hongshi Cement</title>
    <link rel="shortcut icon" href="image/Logo.jpg">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" type="text/css" href="../css/my_order.css">
</head>

<body>
    <div class="box-area">
        <header>
            <div class="wrapper">
                <div class="logo">
                    <h1><a href="../php/index.php">Hongshi</a></h1>
                </div>
                <nav>
                    <div class="nav_menu">
                        <a href="../php/index.php" id="index">Home</a>
                        <a href="about_us.php">About Us</a>
                        <a href="order_online.php">Order Online</a>
                        <a href="contactus.php">Contact Us</a>
                        <select class="dropdown" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="">
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
                            <option value="my_cart.php">My Cart</option>
                            <option value="my_order.php">My Order</option>
                            <option value="logout.php">Logout</option>
                        </select>
                    </div>
                </nav>
            </div>
        </header>
    </div>
    <h1 id="title">My Orders:</h1>
    <div class="table-container">
        <table>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Total</th>

            </tr>
            <?php
            include "../php/connection.php";
            $user_email = $_SESSION['email'];
            $query = "SELECT * FROM my_order WHERE user_email = '$user_email'";
            $sql = mysqli_query($conn, $query);

            while ($data = mysqli_fetch_array($sql)) {
                $id = $data['id'];
                $product_id = $data['product_id'];
                $name = $data['name'];
                $quantity = $data['quantity'];
                $subtotal = $data['subtotal'];

            ?>
            <tr>
                <td><?php echo $name?></td>
                <td><?php echo $quantity?></td>
                <td><?php echo $subtotal?></td>
            </tr>
            <?php
            }
            ?>
        </table>
        
    </div>
</body>
</html>