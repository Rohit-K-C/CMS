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
        session_start();
        $user_email = $_SESSION['email'];
        $getId = mysqli_query($conn, "SELECT id FROM users WHERE email='$user_email'");
        while ($uid = mysqli_fetch_array($getId)) {
            $user_id = $uid['id'];
        }
        $query = "SELECT * FROM cart WHERE user_id =  '$user_id'";
        $sql = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($sql)) {

            $id = $row['id'];
            $product_id =  $row['product_id'];
            $image = $row['image'];
            $name = $row['name'];
            $quantity = $row['quantity'];
            $price = $row['price'];
            $subtotal = $price * $quantity;
            $check_details[] = array($name, $quantity, $subtotal, $product_id);

        ?>

            <tr>
                <td><a id="cartDel" href="delete_cart.php?user_id=<?php echo $id; ?>"><i class="fa-sharp fa-regular fa-circle-xmark"></i></a></td>
                <td><img id="cart_image" src="<?php echo "$image"; ?>" alt="product_image"></td>
                <td><?php echo "$name"; ?></td>
                <td>
                    <form action="">
                        <input type="number" min="1" name="qty" id="quantity-<?php echo $id; ?>" value="<?php echo $quantity; ?>" onchange="updateCartItem(<?php echo $id; ?>, this.value)">

                    </form>
                    <script>
                        function updateCartItem(itemId, newQuantity) {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', 'update_cart.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onload = function() {
                                if (xhr.status === 200) {
                                    var responseData = JSON.parse(xhr.responseText);
                                    var price = responseData.price;
                                    var subtotal = responseData.subtotal;
                                    var priceElement = document.getElementById('price-' + itemId);
                                    var subtotalElement = document.getElementById('subtotal-' + itemId);

                                    priceElement.innerText = 'Rs. ' + price;
                                    subtotalElement.innerText = 'Rs. ' + subtotal;
                                } else {
                                    console.error('Error updating cart item');
                                }
                            };
                            var data = 'item_id=' + encodeURIComponent(itemId) + '&quantity=' + encodeURIComponent(newQuantity);
                            xhr.send(data);
                        }
                    </script>
                </td>
                <td><?php echo "Rs. $price";
                    ?></td>
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

    <div class="checkout">

        <a href="checkout.php?check_detail=<?php echo urlencode(json_encode($check_details)); ?>">Proceed to checkout</a>
    </div>
</body>

</html>