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
    <div class="add_product">
        <span id="new_product">Add New Product</span><br>
        <form action="insert_product.php" method="post" enctype="multipart/form-data">
            <label for="">Product Name:
            </label>
            <input type="text" name="product_name" id="name">

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
            </label>

            <select id="addCat" name="category">
                <option value="PPC">PPC</option>
                <option value="OPC">OPC</option>
                <option value="50 grade">50 grade</option>
            </select>
            <label for="">Details:
            </label>
            <input type="text" name="details" id="details">
            <label for="">Quantity:
            </label>
            <input type="number" name="quantity" id="quantity">
            <label for="">Weight:
            </label>
            <input type="number" name="weight" id="weight">
            <label for="">Product Manufacturer:
            </label>
            <input type="text" name="manufacturer" id="manufacturer">
            <label for="">Price:
            </label>
            <input type="number" name="price" id="price">

            <input type="submit" name="submit" value="Submit" id="submit">
        </form>

    </div>

</body>

</html>