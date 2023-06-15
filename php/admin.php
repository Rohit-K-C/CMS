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

    <div class="left-bar">


        <a id="logo" href="../php/admin.php">Hongshi</a>
        <div class="nav_menu">

            <a href="../php/adminDashboard.php" id="index"><i class="fa-sharp fa-solid fa-chart-simple"></i>Overview</a>
            <a href="../php/add_product.php" id="add-product"><i class="fa-solid fa-bag-shopping"></i>Add Product</a>
            <a href="../php/all.php" id="all-products"><i class="fa-regular fa-rectangle-list"></i>All Product</a>
            <a href="../php/order_notification.php" id="orders"><i class="fa-solid fa-mobile"></i>Orders</a>


        </div>
        <div class="bottom">
            <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>

        </div>

    </div>
    <div class="right-bar">
       

        <iframe name="iframeTarget" src="../php/adminDashboard.php"></iframe>
        <script>
        const indexLink = document.getElementById('index');
        const addProductLink = document.getElementById('add-product');
        const allProductsLink = document.getElementById('all-products');
        const ordersLink = document.getElementById('orders');
        const iframe = document.querySelector('iframe[name="iframeTarget"]');

        indexLink.addEventListener('click', function (event) {
            event.preventDefault();
            iframe.src = this.getAttribute('href');
        });

        addProductLink.addEventListener('click', function (event) {
            event.preventDefault();
            iframe.src = this.getAttribute('href');
        });

        allProductsLink.addEventListener('click', function (event) {
            event.preventDefault();
            iframe.src = this.getAttribute('href');
        });

        ordersLink.addEventListener('click', function (event) {
            event.preventDefault();
            iframe.src = this.getAttribute('href');
        });
    </script>

    </div>

</body>

</html>