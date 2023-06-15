<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="table-content">
        <span id="new_product">Add New Product</span><br>
        <table>
            <tr>
                <th>Product Name
                </th>
                <th>Category
                </th>
                <th class="column">Details
                </th>
                <th>Quantity
                </th>
                <th>Weight
                </th>
                <th>Manufacturer
                </th>
                <th>Price
                </th>
                <th colspan="2">Action</th>

            </tr>
            <?php
            include "../php/connection.php";
            $query = "SELECT * FROM products";
            $sql = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($sql)) {

                $id = $row['id'];
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
                    <td style="width: 150px;"><?php echo "$detail"; ?></td>
                    <td><?php echo "$quantity"; ?></td>
                    <td><?php echo "$weight"; ?></td>
                    <td><?php echo "$manufacturer"; ?></td>
                    <td><?php echo "$price"; ?></td>
                    <td><a id="editDel" href="all.php?id=<?php echo $id; ?>&button=<?php echo 'edit'; ?>"><i id="edit" class="fa-regular fa-pen-to-square"></i></a></td>
                    <td><a id="editDel" href="all.php?id=<?php echo $id; ?>&button=<?php echo 'delete'; ?>"><i id="delete" class="fa-solid fa-trash"></i></a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <?php
    if (isset($_GET['id'])  && isset($_GET['button'])) {
        $id = $_GET['id'];
        $button = $_GET['button'];
        if ($button == 'edit') {
            $editql = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
            while ($row =  mysqli_fetch_array($editql)) {
                $name = $row['name'];
                $image = $row['image'];
                $category = $row['category'];
                $detail = $row['details'];
                $quantity = $row['quantity'];
                $weight = $row['weight'];
                $manufacturer = $row['manufacturer'];
                $price = $row['price'];
                

    ?>
                <div class="formContaier">
                    <form action="update_product.php" method="post" enctype="multipart/form-data">
                        <input type="number" name="id" id="id" value="<?php echo $id; ?>" hidden>
                        <label for="">Product Name:
                            <input type="text" name="product_name" id="name" value="<?php echo $name; ?>">
                        </label>

                        <label>Product Image</label>
                        <br>

                        <input hidden type="text" name="default" id="" value="<?php echo $image; ?>">

                        <img id="upload" src="<?php echo $image; ?>">
                        <input type="file" id="file" name="uploadfile">
                        <label for="file" id="editBtn">Image</label>
                        <script>
                            const imgDiv = document.querySelector('.upload-pic');
                            const img = document.querySelector('#upload');
                            const file = document.querySelector('#file');
                            const uploadBtn = document.querySelector('#uploadBtn');

                            file.addEventListener('change', function() {
                                const choosedFile = this.files[0];
                                if (choosedFile) {
                                    const reader = new FileReader();
                                    reader.addEventListener('load', function() {
                                        img.setAttribute('src', reader.result);
                                    });
                                    reader.readAsDataURL(choosedFile);
                                }
                            });
                        </script>
                        <br>



                        <script src="../js/app.js"></script>

                        <label for="">Product Category:
                            <br>
                            <select id="editCat" name="category">
                                <option value="PPC" <?php if ($category === 'PPC') {
                                                        echo ' selected';
                                                    } ?>>PPC</option>
                                <option value="OPC" <?php if ($category === 'OPC') {
                                                        echo ' selected';
                                                    } ?>>OPC</option>
                                <option value="50 grade" <?php if ($category === '50 grade') {
                                                                echo ' selected';
                                                            } ?>>50 grade</option>
                            </select>
                            <br>

                        </label>
                        <label for="">Details:
                            <input type="text" name="details" id="details" value="<?php echo $detail; ?>">
                        </label>
                        <label for="">Quantity:
                            <input type="number" name="quantity" id="quantity" value="<?php echo $quantity; ?>">
                        </label>
                        <label for="">Weight:
                            <input type="number" name="weight" id="weight" value="<?php echo $weight; ?>">
                        </label>
                        <label for="">Product Manufacturer:
                            <input type="text" name="manufacturer" id="manufacturer" value="<?php echo $manufacturer; ?>">
                        </label>
                        <label for="">Price:
                            <input type="number" name="price" id="price" value="<?php echo $price; ?>">
                        </label>
                        <br>
                        <input type="submit" name="submit" value="Submit" id="submit">
                    </form>
                </div>
    <?php
            }
        } else {
            $sql = mysqli_query($conn, "DELETE FROM products WHERE id='$id'");
            if (!$sql) {
                echo "<script>alert('Failed to Delete product')
                window.location.href='all.php';
                </script>";
            } else {
                echo "<script>alert('Product Deleted')
                window.location.href='all.php';
                </script>";
            }
        }
    }


    ?>


</body>

</html>