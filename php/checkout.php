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
                        <option value="logout.php">Logout</option>
                        <option value="my_cart.php">My Cart</option>
                    </select>
                </div>
            </nav>
        </div>
    </header>
    <div class="checkout-container">
        <div class="billing-details">
            <h1>Billing Details</h1>
            <form action="">
                <input type="text" name="firstName" placeholder="First Name">
                <input type="text" name="lastName" placeholder="Last Name">
                <input type="text" name="country" value="Nepal" readonly>
                <input type="text" name="street-address" placeholder="Street Address">
                <input type="text" name="firstName" placeholder="First Name">
                <input type="text" name="states" value="Bagmati" readonly>
                <input type="number" name="postal-code" placeholder="Postcode/ZIP">
                <input type="number" name="phone" placeholder="Phone">
                <input type="email" name="email" placeholder="Email">

            </form>
        </div>
        <div class="your-order">
            <h1>Your Order</h1>
            <table>
                <tr>
                    <th>Product</th>
                    <th>Subtotal</th>
                </tr>

                <?php
                if (!isset($_GET['check_detail'])) {
                   echo "<tr><td><p style='color:red;'>Please add item.</p></td></tr>";
                } else {
                    $check_details = json_decode(urldecode($_GET['check_detail']), true);

                    if ($check_details === null) {
                        echo "Error decoding JSON data.";
                    } else {
                        $subtotal = 0;

                        foreach ($check_details as $details) {
                            list($name, $quantity, $subtotalItem, $product_id) = $details;
                            $subtotal += $subtotalItem;

                            echo "<tr>";
                            echo "<td>$name <b>x ($quantity)</b></td>";
                            echo "<td>$subtotalItem</td>";
                            echo "</tr>";
                        }

                        echo "<tr>";
                        echo "<td>Total </td>";
                        echo "<td>$subtotal</td>";
                        echo "</tr>";
                    }
                }

                ?>



            </table>
        </div>
        <div class="payment-option">
            <h1>Select payment method</h1>
            <div class="payment-method">
                <a href="../php/order.php?check=<?php echo urlencode(json_encode($check_details)); ?>"><img id="cash-image" src="../images/cash.png" alt=""></a>
                <a href="#" id="payment-button"><img id="khalti-img" src="../images/khalti_logo.jpg" alt=""></a>
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