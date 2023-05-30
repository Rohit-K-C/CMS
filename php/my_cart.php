<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="shortcut icon" href="image/Logo.jpg">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" type="text/css" href="../css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="box-area">
        <header>
            <div class="wrapper">
                <div class="logo">
                    <h1><a href="../php/index.php">Honghshi</a></h1>
                </div>
                <nav>
                    <div class="nav-menu">
                        <a href="../php/index.php">Home</a>
                        <a href="../php/about_us.php">About Us</a>
                        <a href="../php/order_online.php" id="order_online">Order Online</a>
                        <a href="../php/contactus.php">Contact Us</a>
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
                            <option value="logout.php">Logout</option>
                            <option value="my_cart.php">My Cart</option>
                        </select>
                    </div>
                </nav>
            </div>
        </header>

    </div>


    <div class="cart">
        <span style="font-size: 30px;">Cart</span>
        <hr id="cart_line">
    </div>
    <table>
        <tr>
            <th></th>
            <th></th>
            <th>PRODUCT</th>
            <th>QUANTITY</th>
            <th>PRICE</th>
            <th>SUBTOTAL</th>
        </tr>
        <?php
        
        include "../php/connection.php";
        
        $query = "SELECT * FROM cart";
        $sql = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($sql)) {

            $id = $row['id'];
            
            $image = $row['image'];
            $name = $row['name'];
            $quantity = $row['quantity'];
            $price = $row['price'];

        ?>
            <tr>
                <td><a id="cartDel" href="delete_cart.php?user_id=<?php echo $id; ?>"><i class="fa-sharp fa-regular fa-circle-xmark"></i></a></td>
                <td><img id="cart_image" src="<?php echo "$image"; ?>" alt="product_image"></td>
                <td><?php echo "$name"; ?></td>
                <td><?php echo "$quantity"; ?></td>
                <td><?php echo "Rs. $price"; ?></td>
                <td>
                    <?php
                    
                    $subtotal = $price * $quantity;
                    echo "Rs. $subtotal";
                   
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>



    </table>
</body>

</html>