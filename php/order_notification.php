<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="add_product">
        <div class="table-content">
            <span id="new_product">Add New Product</span><br>
            <table>
                <tr>
                    <th>Order Id</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Product Id</th>
                    <th>Email</th>
                    <th>Order Status</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                include "../php/connection.php";
                $query = "SELECT * FROM my_order";
                $sql = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($sql)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $quantity = $row['quantity'];
                    $subtotal = $row['subtotal'];
                    $product_id = $row['product_id'];
                    $user_email = $row['user_email'];
                    $order_status = $row['order_status'];
                ?>
                    <tr>
                        <td><?php echo "$id"; ?></td>
                        <td><?php echo "$name"; ?></td>
                        <td><?php echo "$quantity"; ?></td>
                        <td><?php echo "$subtotal"; ?></td>
                        <td><?php echo "$product_id"; ?></td>
                        <td><?php echo "$user_email"; ?></td>
                        <td><?php echo "$order_status"; ?></td>
                        <td><a class="editDelLink" href="order_notification.php?id=<?php echo $id; ?>&button=<?php echo 'approved'; ?>"><i id="edit" class="fa-regular fa-pen-to-square"></i></a></td>
                        <td><a class="editDelLink" href="order_notification.php?id=<?php echo $id; ?>&button=<?php echo 'refunded'; ?>"><i id="delete" class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php
                }
                ?>

                <?php
                // error_reporting(E_ALL & ~E_WARNING);
                // ob_start();
                if (isset($_GET['id']) && isset($_GET['button'])) {
                    $id = $_GET['id'];
                    $button = $_GET['button'];
                    if ($button == 'approved') {
                        $editql = mysqli_query($conn, "SELECT * FROM my_order WHERE id='$id'");
                        while ($row = mysqli_fetch_array($editql)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $quantity = $row['quantity'];
                            $subtotal = $row['subtotal'];
                            $product_id = $row['product_id'];
                            $user_email = $row['user_email'];
                            $order_status = $row['order_status'];
                        }
                        $sql = mysqli_query($conn, "UPDATE my_order SET order_status ='approved' WHERE  id='$id'");
                        echo '<script>window.location.href = "order_notification.php";</script>';
                        exit();
                    } else {
                        $sql = mysqli_query($conn, "UPDATE my_order SET order_status ='refunded' WHERE  id='$id'");
                        echo '<script>window.location.href = "order_notification.php";</script>';
                        exit();
                    }
                }
                // ob_end_flush();
                ?>
            </table>

            <script>
                const editDelLinks = document.querySelectorAll('.editDelLink');
                const iframe = window.parent.document.querySelector('iframe[name="iframeTarget"]');

                editDelLinks.forEach((link) => {
                    link.addEventListener('click', function(event) {
                        event.preventDefault(); // Prevents the default navigation behavior

                        const linkHref = this.getAttribute('href');
                        iframe.src = linkHref; // Updates the source attribute of the iframe in the parent window
                    });
                });
            </script>
        </div>
    </div>
</body>

</html>