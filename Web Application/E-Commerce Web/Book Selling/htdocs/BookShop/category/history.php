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
                <li><a href="kids.php">Kids</a></li>
                <li><a href="old.php">Old Books</a></li>
            </ul>
        </nav>
    </aside>
<main>
    <div class="content">
        <h2>Historical Books for you</h2>
        <div class="product-list">
            <?php
            $sql = "SELECT `books`.*, `images`.`img1` FROM `books` 
                    LEFT JOIN `images` ON `books`.`Id`=`images`.`Id`
                    WHERE (`category` LIKE '%historical%' OR
                    `category` LIKE '%history%' OR
                    `category` LIKE '%ancient%' OR
                    `category` LIKE '%medieval%' OR
                    `category` LIKE '%war%' OR
                    `category` LIKE '%revolution%' OR
                    `category` LIKE '%empire%' OR
                    `category` LIKE '%civilization%' OR
                    `category` LIKE '%biography%' OR
                    `category` LIKE '%slam%' OR
                    `category` LIKE '%monarch%' OR
                    `category` LIKE '%heritage%' OR
                    `category` LIKE '%legacy%' OR
                    `category` LIKE '%antiquity%' OR
                    `category` LIKE '%classic%'
                ) 
                OR (
                    `department` LIKE '%history%' OR
                    `department` LIKE '%humanities%' OR
                    `department` LIKE '%classics%' OR
                    `department` LIKE '%social science%' OR
                    `department` LIKE '%world studies%' OR
                    `department` LIKE '%culture%' OR
                    `department` LIKE '%archaeology%' OR
                    `department` LIKE '%anthropology%' OR
                    `department` LIKE '%sociology%' OR
                    `department` LIKE '%philosophy%' OR
                    `department` LIKE '%politics%' OR
                    `department` LIKE '%geography%' OR
                    `department` LIKE '%literature%' OR
                    `department` LIKE '%ethnology%' OR
                    `department` LIKE '%civil studies%'
                )
                OR (
                    `BName` LIKE '%history%' OR
                    `BName` LIKE '%ancient%' OR
                    `BName` LIKE '%medieval%' OR
                    `BName` LIKE '%war%' OR
                    `BName` LIKE '%revolution%' OR
                    `BName` LIKE '%empire%' OR
                    `BName` LIKE '%civilization%' OR
                    `BName` LIKE '%biography%' OR
                    `BName` LIKE '%dynasty%' OR
                    `BName` LIKE '%monarch%' OR
                    `BName` LIKE '%heritage%' OR
                    `BName` LIKE '%legacy%' OR
                    `BName` LIKE '%antiquity%' OR
                    `BName` LIKE '%classic%'
                )";
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