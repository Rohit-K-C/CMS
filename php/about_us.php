<!DOCTYPE html>
<html>

<head>
    <title>Hongshi Cement</title>
    <link rel="shortcut icon" href="../images/Logo.jpg">
    <link rel="stylesheet" type="text/css" href="../css/about_us.css">
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
        <div class="banner-area"></div>
        <div class="item">
            <img src="../images/handcement.jpg">
        </div>
        <div class="about us">
            <div class="box">
                <img id="left-image" src="../images/Logo.jpg" class="abt-us" alt="logo">
                <div class="content">
                    <p class="title">About Us</p>
                    <p class="which">Hongshi Cement is a leading cement manufacturer in China. The company has a production
                        capacity of over 60 million tons per year, making it one of the largest cement producers in the country.
                        Hongshi Cement operates several production lines across China and has been expanding its operations through
                        acquisitions and joint ventures. The company has also been investing heavily in research and development to
                        improve its production processes and reduce its environmental footprint.In recent years, Hongshi Cement has
                        been actively exploring international markets and has established production facilities in several countries,
                        including Laos, Vietnam, and Cambodia. The company has also been investing in renewable energy projects, such
                        as wind and solar power, to reduce its carbon emissions and improve its sustainability
                    </p>
                </div>
            </div>
            <div class="box">
                <div class="content">
                    <p class="title">Our Success Journey</p>
                    <p class="which">The success that we’ve achieved so far hasn’t come to us overnight. We have worked day and night
                        constantly to improve our products & services based on our customer’s feedback and suggestions to cater to our
                        buyer’s needs. However, we wouldn’t be in the place that we are in today if it weren’t for our customer’s continuous
                        support.</p>
                </div>
                <img src="../images/success.jpg" class="success" alt="success">
            </div>
            <div class="box">
                <img src="../images/benchmark.jpg" class="benchmark" alt="benchmark">
                <div class="content">
                    <p class="title">Benchmarking Afforadability</p>
                    <p class="which">We’ve never disappointed our buyers with our product pricing.Every product that we offer is priced at
                        the lowest in the market. In order to provide more affordability to our buyers, we offer lucrative
                        discounts and offers.</p>
                </div>
            </div>
            <div class="box">
                <div class="content">
                    <p class="title">Definding Standards</p>
                    <p class="which">The quality standards we adhere to never fall short of our customer’s expectations. Every product
                        listed on our website comes from respected reputed brands across India. Pre-Sale or Post-Sale, our customer
                        support is available to clarify doubts and order-related issues with quick resolution.</p>
                </div>
                <img src="../images/defstan.jpg" class="defstan" alt="defstan">
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="last">
                    <div class="about">
                        <h3>Hongshi</h3><br>
                        <p class="para">Hongshi Cement is a Chinese cement manufacturer with numerous
                            cement plants in China and a planned cement plants in Laos and Nepal. Goldman
                            Sachs owns a 25% stake in the company, having acquired it for RMB 600 million
                            in a deal signed in 2007.</p>
                    </div>
                </div>
                <div class="last">
                    <div class="about">
                        <div class="escape">
                            <h3>Company</h3><br>
                        </div>
                        <div class="quick">
                            <a href="index.php" class="button2">Home</a><br><br>
                            <a href="contact.php" class="button2">Contact</a><br><br>
                            <a href="order_online.php" class="button2">Order Online</a><br><br>
                            <a href="about_us.php" class="button2">About Us</a><br><br>
                        </div>
                    </div>
                </div>
                <div class="last">
                    <div class="about">
                        <h3>Social Media</h3><br>
                        <div class="social">
                            <a href="https://www.facebook.com/" class="button2" target="_blank">Facebook</a><br><br>
                            <a href="https://www.instagram.com/" class="button2" target="_blank">Instagram</a><br><br>
                            <a href="https://www.linkedin.com/" class="button2" target="_blank">Linkedin</a><br><br>
                        </div>
                    </div>
                </div>

            </div>
            <div class="copyright">
                <p>Hongshi Cement @ 2022.</p>
            </div>
        </footer>
    </div>
</body>

</html>