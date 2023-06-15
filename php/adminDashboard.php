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
    <div class="right-bar">
        <nav>
            <span>
                <h1>
                    Welcome back,
                    <?php
                    session_start();
                    if ($_SESSION['name'] == null) {

                        echo "<script>alert('Please Login!')
                                    window.location.href='login.php';
                                    </script>";
                    }
                    echo $_SESSION['name'];
                    ?>
                </h1>
                <h2>
                    Here's what's happening with your store today.
                </h2>
            </span>
            <h1 id="user-name">
                <?php
                if ($_SESSION['name'] == null) {

                    echo "<script>alert('Please Login!')
                                    window.location.href='login.php';
                                    </script>";
                }
                echo $_SESSION['name'];
                ?>
                <i class="angle"> ^ </i>
            </h1>


        </nav>

        <div class="data">
            <a class="data-a" href="">
                <span>
                    <i class="fa-solid fa-bag-shopping"></i>
                    Total Sales
                </span>
                <span> <?php
                        include "../php/connection.php";

                        $query = "SELECT subtotal FROM my_order WHERE  order_status = 'approved'";
                        $result = mysqli_query($conn, $query);

                        $total = 0;

                        while ($row = mysqli_fetch_assoc($result)) {
                            $subtotal = $row['subtotal'];

                            $total += $subtotal;
                        }
                        echo "Rs.  " . $total;
                        ?>
                </span>
            </a>
            <a class="data-a" href="">
                <span>
                    <i class="fa-solid fa-star"></i>
                    Total Orders
                </span>
                <span> <?php
                        include "../php/connection.php";

                        $sql = mysqli_query($conn, "SELECT COUNT(*) as orders FROM `my_order` WHERE order_status = 'approved'");
                        if ($sql) {
                            $row = mysqli_fetch_assoc($sql);
                            $orders = $row['orders'];
                            echo $orders;
                        }
                        ?>
                </span>
            </a>
            <a class="data-a" href="">
                <span>
                    <i id="refund" class="fa-solid fa-turn-down"></i>
                    Refunded
                </span>
                <span> <?php
                        include "../php/connection.php";

                        $sql = mysqli_query($conn, "SELECT COUNT(*) as status FROM `my_order` WHERE order_status = 'refunded'");
                        if ($sql) {
                            $row = mysqli_fetch_assoc($sql);
                            $status = $row['status'];
                            echo $status;
                        }
                        ?>
                </span>
            </a>
            <a class="data-a" href="">
                <span><i class="fa-solid fa-users"></i>
                    Total Users
                </span>
                <span> <?php
                        include "../php/connection.php";

                        $sql = mysqli_query($conn, "SELECT COUNT(*) as total FROM users");
                        if ($sql) {
                            $row = mysqli_fetch_assoc($sql);
                            $total = $row['total'];
                            echo $total;
                        }
                        ?>
                </span>
            </a>
        </div>
    </div>
</body>

</html>