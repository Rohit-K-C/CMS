<!DOCTYPE html>
<html>

<head>
    <title>Hongshi Cement</title>
    <link rel="shortcut icon" href="image/Logo.jpg">
    <link rel="stylesheet" type="text/css" href="../css/contactus.css">
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
                            <option value="my_cart.php">My Cart</option>
                            <option value="my_order.php">My Order</option>
                            <option value="logout.php">Logout</option>
                        </select>
                    </div>
                </nav>
            </div>
        </header>
        <div class="banner-area">
            <div class="title">
                <h2> Get in Touch</h2>
            </div>
            <div class="box">
                <div class="contact form">
                    <h3>Send a Message</h3>
                    <form>
                        <div class="formBox">
                            <div class="row50">
                                <div class="inputBox">
                                    <span>First Name</span>
                                    <input type="text" placeholder="fname">
                                </div>
                                <div class="inputBox">
                                    <span>Last Name</span>
                                    <input type="text" placeholder="lname">
                                </div>
                            </div>
                            <div class="row50">
                                <div class="inputBox">
                                    <span>Email</span>
                                    <input type="text" placeholder="name@gmail.com">
                                </div>
                                <div class="inputBox">
                                    <span>Mobile</span>
                                    <input type="text" placeholder="98XXXXXXXX">
                                </div>
                            </div>
                            <div class="row100">
                                <div class="inputBox">
                                    <span>Message</span>
                                    <textarea placeholder="Write your message here..."></textarea>
                                </div>
                            </div>
                            <div class="row100">
                                <div class="inputBox">
                                    <input type="submit" value="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--info box-->
                <div class="contact info">
                    <h3>Contact Info</h3>
                    <div class="infobox">
                        <div>
                            <span><ion-icon name="location"></ion-icon></span>
                            <p>Naxal,Kathmandu,Nepal</p>
                        </div>
                        <div>
                            <span><ion-icon name="mail"></ion-icon></span>
                            <a href="mailto:zhk-nepal@hongshigroup.com">zhk-nepal@hongshigroup.com</a>
                        </div>
                        <div>
                            <span><ion-icon name="earth"></ion-icon></span>
                            <a href="mailto:www.hongshigroup.com">www.hongshigroup.com</a>
                        </div>
                        <div>
                            <span><ion-icon name="call"></ion-icon></span>
                            <a href="tel:01-4415611">01-4415611</a>
                        </div>
                        <div>
                            <span><ion-icon name="call"></ion-icon></span>
                            <a href="tel:078 505026/078 505016">Hotline:078 505026/078 505016</a>
                        </div>
                    </div>
                </div>
                <!--map-->
                <div class="contact map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.0738598950843!2d85.32421247465788!3d27.
                        71500572515517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb190fb192ad3d%3A0xb1a3158fd7b60777!2sHongshi%
                        20Shivam%20Cement%20P%20Limited!5e0!3m2!1sen!2snp!4v1683366207287!5m2!1sen!2snp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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
</body>

</html>