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
    <div class="add_product">
        <form action="insert_product.php" method="post" enctype="multipart/form-data">
            <label for="">Product Name:
                <input type="text" name="product_name" id="name">
            </label>

            <div id="message">
                <label id="head">Product Image</label>
                <div class="upload-pic">
                    <img src="" id="image">
                    <input type="file" id="file" name="uploadfile">
                    <label class="imageUp" for="file" id="uploadBtn">Image</label>
                </div>

            </div>
            <script src="../js/app.js"></script>

            <label for="">Product Category:
                <br>
                <select id="addCat" name="category">
                    <option value="PPC">PPC</option>
                    <option value="OPC">OPC</option>
                    <option value="50 grade">50 grade</option>
                </select>
            </label>
            <label for="">Details:
                <input type="text" name="details" id="details">
            </label>
            <label for="">Quantity:
                <input type="number" name="quantity" id="quantity">
            </label>
            <label for="">Weight:
                <input type="number" name="weight" id="weight">
            </label>
            <label for="">Product Manufacturer:
                <input type="text" name="manufacturer" id="manufacturer">
            </label>
            <label for="">Price:
                <input type="number" name="price" id="price">
            </label>
            <br>
            <input type="submit" name="submit" value="Submit" id="submit">
        </form>

    </div>

</body>

</html>