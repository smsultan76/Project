<?php
include("../connnect.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boi Bazar</title>
    <link rel="icon" href="../img/icon.png">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    </head>

<body>
    <header>
    <button class="sidebar-icon" onclick="toggleSidebar()">&#9776;</button>

    <a href="../index.php"><h1> Boi Bazar </h1></a>
        <nav>
            <ul class="header-menu">
            <li><a href="../index.php">Home</a></li>
                <li><a href="../info/service.php">Services</a></li>
                <li><a href="../seller/seller.php">Become a Seller</a></li>
                <li><a href="../info/about.php">About</a></li>
                <!-- <li><a href="" style="font-size: 22px;"> Cart 🛒</a></li> -->
                <li>
                    <a href="user/cart.php"><img src="../img/cart.png" height="20px"  oncontextmenu="return false;" alt="icon">
                    </a>
                    <?php
                    if (!isset($_SESSION["UserName"])) {
                      echo '<button onclick="login(1)">Login</button>';
                    } else {
                           echo '<button onclick="login(2)">' . $_SESSION["UserName"] . '</button>';
                    }
                    ?>
                </li>
            </ul>
            <!-- 3-dot icon for header menu -->
        </nav>
            <button class="header-icon" onclick="toggleHeaderMenu()">&#x22EE;</button> 
    </header>
    <aside id="sidebar">
        <h2>Categories</h2>
        <nav>
        <ul class="sidebar-menu">
                <li><a href="new.php">New Books</a></li>
                <li><a href="islamic.php">Islamic</a></li>
                <li><a href="top.php">Top Selling</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="kids.php">Kids</a></li>
            </ul>
        </nav>
    </aside>
<main>
    <div class="content">
        <h2>Old Selling Book for you</h2>
        <div class="product-list">
            <?php
            $sql = "SELECT `books`.*, `images`.`img1` FROM `books` 
                    LEFT JOIN `images` ON `books`.`Id`=`images`.`Id`
                    WHERE (BName LIKE '%used%' OR
    BName LIKE '%pre-owned%' OR
    BName LIKE '%second-hand%' OR
    BName LIKE '%vintage%' OR
    BName LIKE '%old%' OR
    BName LIKE '%classic%' OR
    BName LIKE '%antique%' OR
    BName LIKE '%rare%' OR
    BName LIKE '%previously owned%' OR
    BName LIKE '%previous owner%' OR
    BName LIKE '%collector%' OR
    BName LIKE '%aged%' OR
    BName LIKE '%retro%' OR
    BName LIKE '%out-of-print%' OR
    BName LIKE '%discontinued%' OR
    BName LIKE '%preloved%' OR
    BName LIKE '%outdated%' OR
    BName LIKE '%nostalgic%' OR
    BName LIKE '%used book%' OR
    BName LIKE '%well-worn%')

    -- Filtering based on `category` for keywords related to old books
    AND (category LIKE '%used%' OR
    category LIKE '%pre-owned%' OR
    category LIKE '%second-hand%' OR
    category LIKE '%vintage%' OR
    category LIKE '%old%' OR
    category LIKE '%classic%' OR
    category LIKE '%antique%' OR
    category LIKE '%rare%' OR
    category LIKE '%previously owned%' OR
    category LIKE '%collector%' OR
    category LIKE '%retro%' OR
    category LIKE '%out-of-print%' OR
    category LIKE '%discontinued%' OR
    category LIKE '%preloved%' OR
    category LIKE '%outdated%' OR
    category LIKE '%nostalgic%' OR
    category LIKE '%well-worn%' OR
    category LIKE '%historic%' OR
    category LIKE '%limited edition%' OR
    category LIKE '%hard-to-find%')

    -- Filtering based on `department` for keywords related to old books
    AND (department LIKE '%used%' OR
    department LIKE '%pre-owned%' OR
    department LIKE '%second-hand%' OR
    department LIKE '%vintage%' OR
    department LIKE '%old%' OR
    department LIKE '%classic%' OR
    department LIKE '%antique%' OR
    department LIKE '%rare%' OR
    department LIKE '%collector%' OR
    department LIKE '%retro%' OR
    department LIKE '%out-of-print%' OR
    department LIKE '%discontinued%' OR
    department LIKE '%preloved%' OR
    department LIKE '%outdated%' OR
    department LIKE '%nostalgic%' OR
    department LIKE '%well-worn%' OR
    department LIKE '%historic%' OR
    department LIKE '%limited edition%' OR
    department LIKE '%hard-to-find%')";
            $result = mysqli_query($conn, $sql);
            while ($rows = mysqli_fetch_assoc($result)) {
                echo '<div class="product">';
                $Id = $rows["Id"];
                if (!empty($rows['img1'])) {
                    echo '<a href="../product.php?Id=' . $Id . '"><img src="data:image/jpeg;base64,' . base64_encode($rows["img1"]) . '" alt="Product 1"></a>';
                } else {
                    echo '<a href="../product.php?Id=' . $Id . '"><img src="../img/product2.jpg" alt="Product 1"></a>';
                }
                echo '<a href="../product.php?Id=' . $Id . '"><h4 >' . $rows["BName"] . '</h4></a>';
                echo '<p>BDT : ' . $rows["price"] . ' TK</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    </main>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-left">
                <h3>About Us</h3>
                <p>Faridpur Engineering College CSE Department 3rd year 1st Semester Project, a online Book Shop. Name Boi Bazar.<br>
                    <b>Design By</b><a target="_blank" href="http://fb.com/smsultan76"> Sultanum Mobin</a>
                </p>
            </div>
            <div class="footer-center">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home </a></li>
                    <li><a href="../info/about.php">About</a></li>
                    <li><a href="../info/service.php">Services</a></li>
                    <li><a href="../info/contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="footer-right">
                <h3>Follow Us</h3>
                <div class="social-icons">
                <a href="https://facebook.com/smsultan76" target="_blank"><i class="fab fa-facebook-f"></i></a>
  	 				<a href="https://wa.me/+8801723332972" target="_blank"><i class="fab fa-whatsapp"></i></a>
  	 				<a href="https://github.com/smsultan76" target="_blank"><i class="fab fa-github"></i></a>
  	 				<a href="https://linkedin.com/in/smsultan76" target="_blank"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Boi Bazar. All rights reserved.</p>
        </div>
    </footer>


</body>

<script src="script.js"></script>

</html>