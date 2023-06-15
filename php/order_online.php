<!DOCTYPE html>
<html>

<head>
    <title>Hongshi Cement</title>
    <link rel="shortcut icon" href="../images/Logo.jpg">
    <link rel="stylesheet" type="text/css" href="../css/order_online.css">
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
                            <option value="my_cart.php">My Cart</option>
                            <option value="my_order.php">My Order</option>
                            <option value="logout.php">Logout</option>
                        </select>
                    </div>
                </nav>
            </div>
        </header>
        <section class="trending-prodects" id="trending">
            <div class="item">
                <img src="../images/order.jpg">
            </div>
            <div class="center-text">
                <span id="our_product">Our Products</span>
            </div>



            <div class="products">
                <?php
                include "../php/connection.php";
                $sql = mysqli_query($conn, "SELECT * FROM products");
                while ($row = mysqli_fetch_array($sql)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $image = $row['image'];
                    $category = $row['category'];
                    $detail = $row['details'];
                    $quantity = $row['quantity'];
                    $weight = $row['weight'];
                    $manufacturer = $row['manufacturer'];
                    $price = $row['price'];
                ?>
                    <div class="row">
                        <img id="product_image" src="<?php echo $image; ?>" alt="">
                        <div class="product-text">
                            <div id="product_name">Honghshi Center(OPC)-50KG</div>
                            <div id="product_description">
                                <p><b>Description: </b><?php echo $detail; ?></p>
                                <p><b>Category: </b><?php echo $category; ?></p>
                                <p><b>In stock: </b><?php echo $quantity; ?></p>
                                <!-- <p><b>Select Quantity: </b><form></form></p> -->
                                <p><b>Weight: </b><?php echo $weight; ?></p>
                                <p><b>Manufacturer: </b><?php echo $manufacturer; ?></p>

                            </div>
                        </div>
                        <div class="price">

                            <p id="price">NRs. <?php echo $price; ?></p>
                            <a href="add_to_cart.php?id=<?php echo $id; ?>" class="button">ADD TO CART</a>
                        </div>
                    </div>
                <?php
                }

                ?>







            </div>
        </section>
    </div>
    <footer>
        <div class="container">
            <div class="last">
                <div class="about">
                    <h3>Hongshi</h3><br>
                    <p class="para">Hongshi Cement is a Chinese cement manufacturer with numerous
                        cement plants in China and a planned cement plants in Laos and Nepal. Goldman
                        Sachs owns a 25% stake in the company, having acquired it for RMB 600 million
                        in a deal signed in 2007.</p>
                </div>
            </div>
            <div class="last">
                <div class="about">
                    <div class="escape">
                        <h3>Company</h3><br>
                    </div>
                    <div class="quick">
                        <a href="index.php" class="button2">Home</a><br><br>
                        <a href="contact.php" class="button2">Contact</a><br><br>
                        <a href="order_online.php" class="button2">Order Online</a><br><br>
                        <a href="about_us.php" class="button2">About Us</a><br><br>
                    </div>
                </div>
            </div>
            <div class="last">
                <div class="about">
                    <h3>Social Media</h3><br>
                    <div class="social">
                        <a href="https://www.facebook.com/" class="button2" target="_blank">Facebook</a><br><br>
                        <a href="https://www.instagram.com/" class="button2" target="_blank">Instagram</a><br><br>
                        <a href="https://www.linkedin.com/" class="button2" target="_blank">Linkedin</a><br><br>
                    </div>
                </div>
            </div>

        </div>
        <div class="copyright">
            <p>Hongshi Cement @ 2022.</p>
        </div>
    </footer>
</body>

</html>