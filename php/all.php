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
                <h1><a href="#">Hongshi</a></h1>
            </div>
            <nav>
                <div class="nav_menu">
                    <a href="../php/admin.php" id="Home">Home</a>
                    <a href="../php/add_product.php" id="add_product">Add Product</a>
                    <a href="../php/all.php" id="index">All product</a>
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
                    </select>
                </div>
            </nav>
        </div>
    </header>
    <div class="table-content">


        <table>
            <tr>
                <th>Product Name
                </th>
                <th>Category
                </th>
                <th>Details
                </th>
                <th>Quantity
                </th>
                <th>Weight
                </th>
                <th>Manufacturer
                </th>
                <th>Price
                </th>

            </tr>
            <?php
            include "../php/connection.php";
            $query = "SELECT * FROM products";
            $sql = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($sql)) {
                $name = $row['name'];
                $category = $row['category'];
                $detail = $row['details'];
                $quantity = $row['quantity'];
                $weight = $row['weight'];
                $manufacturer = $row['manufacturer'];
                $price = $row['price'];

            ?>
                <tr>
                    <td><?php echo "$name"; ?></td>
                    <td><?php echo "$category"; ?></td>
                    <td><?php echo "$detail"; ?></td>
                    <td><?php echo "$quantity"; ?></td>
                    <td><?php echo "$weight"; ?></td>
                    <td><?php echo "$manufacturer"; ?></td>
                    <td><?php echo "$price"; ?></td>
                </tr>
            <?php
            }

            ?>
        </table>
    </div>
</body>

</html>