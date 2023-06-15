<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/checkout.css">
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>

</head>

<body>
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
    <div class="checkout-container">
        <div class="billing-details">
            <h1>Billing Details</h1>
            <?php

            include "../php/connection.php";
            $user_email = $_SESSION['email'];
            $getId = mysqli_query($conn, "SELECT id FROM users WHERE email='$user_email'");
            while ($row = mysqli_fetch_array($getId)) {
                $user_id = $row['id'];
            }
            if (isset($_POST['submit'])) {

                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $country = $_POST['country'];
                $street_address = $_POST['streetAddress'];
                $state = $_POST['state'];
                $postal_code = $_POST['postalCode'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $checkData = mysqli_query($conn, "SELECT COUNT(1) FROM billing_details where user_id='$user_id'");
                $bill = mysqli_fetch_row($checkData);
                if ($bill[0] > 0) {
                    $sql = mysqli_query($conn, "UPDATE billing_details SET 
                    firstName='$firstName',
                    lastName='$lastName',
                    country='$country',
                    street_address='$street_address',
                    state='$state',
                    postal_code='$postal_code',
                    email='$email',
                    phone='$phone' 
                    WHERE user_id='$user_id';
                    ");
                    if ($sql) {
                        echo "<script>
                            alert('Updated');
                        </script>";
                    }
                } else {

                    $sql = mysqli_query($conn, "INSERT INTO billing_details (firstName, lastName, country, street_address, state, postal_code, email, phone, user_id) VALUES  ('$firstName','$lastName','$country','$street_address','$state','$postal_code', '$email', '$phone', '$user_id')");
                    if ($sql) {
                        echo "<script>
                            alert('Saved');
                        </script>";
                    }
                }
            }

            ?>
            <?php
            $billSql = mysqli_query($conn, "SELECT * FROM billing_details WHERE user_id='$user_id'");
            $bill = mysqli_fetch_array($billSql);

            if ($bill) {
                $firstName = $bill['firstname'] ?? '';
                $lastName = $bill['lastname'] ?? '';
                $country = $bill['country'] ?? '';
                $street_address = $bill['street_address'] ?? '';
                $postal_code = $bill['postal_code'] ?? '';
                $email = $bill['email'] ?? '';
                $phone = $bill['phone'] ?? '';

            ?>
                <form id="billingDetails" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="text" name="firstName" placeholder="First Name" required value="<?php echo $firstName; ?>">
                    <input type="text" name="lastName" placeholder="Last Name" required value="<?php echo $lastName; ?>">
                    <input type="text" name="country" value="Nepal" readonly required value="<?php echo $country; ?>">
                    <input type="text" name="streetAddress" placeholder="Street Address" value="<?php echo $street_address; ?>">
                    <input type="text" name="state" value="Bagmati" readonly required>
                    <input type="number" name="postalCode" placeholder="Postcode/ZIP" required value="<?php echo $postal_code; ?>">
                    <input type="number" name="phone" placeholder="Phone" required value="<?php echo $phone; ?>">
                    <input type="email" name="email" placeholder="Email" required value="<?php echo $email; ?>">
                    <input type="submit" name="submit" value="Save">

                </form>
            <?php

            } else {
            ?>
                <form id="billingDetails" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="text" name="firstName" placeholder="First Name" required>
                    <input type="text" name="lastName" placeholder="Last Name" required>
                    <input type="text" name="country" value="Nepal" readonly required>
                    <input type="text" name="streetAddress" placeholder="Street Address">
                    <input type="text" name="state" value="Bagmati" readonly required>
                    <input type="number" name="postalCode" placeholder="Postcode/ZIP" required>
                    <input type="number" name="phone" placeholder="Phone" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="submit" name="submit" value="Save">

                </form>
            <?php
            }
            ?>







        </div>
        <div class="your-order">
            <h1>Your Order</h1>
            <table>
                <tr>
                    <th>Product</th>
                    <th>Subtotal</th>
                </tr>

                <?php
                $query = "SELECT * FROM cart WHERE user_id = '$user_id'";
                $sql = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($sql);

                if (!$row) {
                    echo "<tr><td><p style='color:red;'>Please add item.</p></td></tr>";
                } else {
                    $subtotal = 0;

                    while ($row) {
                        $id = $row['id'];
                        $product_id = $row['product_id'];
                        $image = $row['image'];
                        $name = $row['name'];
                        $quantity = $row['quantity'];
                        $price = $row['price'];
                        $subtotalItem = $price * $quantity;
                        $subtotal += $subtotalItem;

                        echo "<tr>";
                        echo "<td>$name <b>x ($quantity)</b></td>";
                        echo "<td>$subtotalItem</td>";
                        echo "</tr>";

                        $row = mysqli_fetch_array($sql); // Fetch the next row
                    }

                    echo "<tr>";
                    echo "<td>Total </td>";
                    echo "<td>$subtotal</td>";
                    echo "</tr>";
                }


                // if (!isset($_GET['check_detail'])) {
                //     echo "<tr><td><p style='color:red;'>Please add item.</p></td></tr>";
                // } else {
                //     $check_details = json_decode(urldecode($_GET['check_detail']), true);

                //     if ($check_details === null) {
                //         echo "Error decoding JSON data.";
                //     } else {
                //         $subtotal = 0;

                //         foreach ($check_details as $details) {
                //             list($name, $quantity, $subtotalItem, $product_id) = $details;
                //             $subtotal += $subtotalItem;

                //             echo "<tr>";
                //             echo "<td>$name <b>x ($quantity)</b></td>";
                //             echo "<td>$subtotalItem</td>";
                //             echo "</tr>";
                //         }

                //         echo "<tr>";
                //         echo "<td>Total </td>";
                //         echo "<td>$subtotal</td>";
                //         echo "</tr>";
                //     }
                // }


                ?>



            </table>
        </div>
        <div class="payment-option">
            <h1>Select payment method</h1>
            <div class="payment-method">
                <?php

                if (!isset($bill)) {
                    echo "<p id='bill-error' style='color:red;'>Please fill the billng details.</p>";
                ?>
                    <a><img id="cash-image" src="../images/cash.png" alt=""></a>
                    <a href="#" id="payment-button"><img id="khalti-img" src="../images/khalti_logo.jpg" alt=""></a>

                <?php
                } else {
                ?>
                    <a href="../php/order.php"><img id="cash-image" src="../images/cash.png" alt=""></a>
                    <a href="#" id="payment-button"><img id="khalti-img" src="../images/khalti_logo.jpg" alt=""></a>

                <?php
                }
                ?>
                <script>
                    var config = {
                        // replace the publicKey with yours
                        "publicKey": "test_public_key_dc74e0fd57cb46cd93832aee0a390234",
                        "productIdentity": "1234567890",
                        "productName": "Dragon",
                        "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
                        "paymentPreference": [
                            "KHALTI",
                            "EBANKING",
                            "MOBILE_BANKING",
                            "CONNECT_IPS",
                            "SCT",
                        ],
                        "eventHandler": {
                            onSuccess(payload) {
                                // hit merchant api for initiating verfication
                                console.log(payload);
                            },
                            onError(error) {
                                console.log(error);
                            },
                            onClose() {
                                console.log('widget is closing');
                            }
                        }
                    };

                    var checkout = new KhaltiCheckout(config);
                    var btn = document.getElementById("payment-button");
                    btn.onclick = function() {
                        // minimum transaction amount must be 10, i.e 1000 in paisa.
                        checkout.show({
                            amount: 1000
                        });
                    }
                </script>
            </div>
        </div>
    </div>

</body>

</html>