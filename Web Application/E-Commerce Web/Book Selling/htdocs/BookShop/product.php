<?php
session_start();
require 'connnect.php';
// if (empty($_GET["Id"])) header("Location: index.php");
if (isset($_SESSION["UserName"])) {
    $username = $_SESSION["UserName"];
    $sql = 'SELECT * FROM `users` Where `UserName`="' . $username . '"';
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $userid = $row["SL"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    </head>

<body>
    <header>
    <a href="index.php"><h1> Boi Bazar </h1></a>
        <nav>
            <ul class="header-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About</a></li>
                <li>
                    <a href="user/cart.php"><img src="img/cart.png" height="20px" oncontextmenu="return false;" alt="icon">
                    </a>
                </li>
            </ul>
        </nav>
        <button class="header-icon" onclick="toggleHeaderMenu()">&#x22EE;</button>
    </header>

    <main class="content">
        <h2>Product Details</h2>
        <div class="product-detail">
            <?php
            $gid = $_GET["Id"];
            $sql = "SELECT `books`.*, `images`.`img1` FROM `books` 
                    LEFT JOIN `images` ON `books`.`Id`=`images`.`Id`
                    WHERE `books`.`Id`=$gid";
            $result = mysqli_query($conn, $sql);
            while ($rows = mysqli_fetch_assoc($result)) {
                $Id = $rows["Id"];
                if (!empty($rows['img1'])) {
                    echo '<a href="product.php?Id=' . $Id . '"><img src="data:image/jpeg;base64,' . base64_encode($rows["img1"]) . '" alt="Product 1"></a>';
                } else {
                    echo '<a href="product.php?Id=' . $Id . '"><img src="img/product2.jpg" alt="Product 1"></a>';
                }
                echo '<a href="product.php?Id=' . $Id . '"><h4>' . $rows["BName"] . '</h4></a> ';
                echo '<i>by </i> ' . $rows["WName"];
                echo '<p><i>' . $rows["Edition"] . '</i></p> ';
                echo '<p> ' . $rows["category"] . ' Book </p>';
                echo '<p>BDT : ' . $rows["price"] . ' TK</p>';
                $price = $rows["price"];
            }
            ?>
            <form action="" method="post">
                <input type="hidden" name="userId" value="<?php echo $userid; ?>">
                <input type="hidden" name="productId" value="<?php echo $gid; ?>">
                <button type="submit" name="AC" value="submit">Add to Cart</button>
                <?php
                if (isset($_POST["AC"])) {
                    if (isset($_SESSION["UserName"])) {
                        $userid = $_POST["userId"];
                        $productId = $_POST["productId"];
                        $sql = "SELECT * FROM `cart` WHERE `user_id`=? AND `product_id`=? ";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ii", $userid, $productId);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            $sql = "UPDATE `cart` SET `quantity` = quantity + 1 WHERE `user_id` =? AND `product_id`=? ";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ii", $userid, $productId);
                            $stmt->execute();
                            echo "<p> Product successfully added to the cart!</p>";
                        } else {
                            $sql = "INSERT INTO cart (`user_id`, `product_id`, `quantity`) VALUES (?, ?, 1)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ii", $userid, $productId);
                            if ($stmt->execute()) {
                                echo "<p> Product successfully added to the cart!</p>";
                            } else {
                                echo "Error: " . $conn->error;
                            }
                        }
                    } else {
                        echo "<p style='color: red;'>You must be Login to add product in your cart. <a href='user/login.php'> login here</a></p>";
                    }
                }
                ?>
            </form>
            <h3>Standard Delivery BDT: 100 TK</h3>
        </div>
        <div class="total">
            <h3>Total Amount: <?php echo $price + 100; ?> TK</h3>
            <form action="checkout/checkout.php" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $gid; ?>">
                <button type="submit" name="buynow">Buy Now</button>
            </form>
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
                    <li><a href="info/about.php">About</a></li>
                    <li><a href="info/service.php">Services</a></li>
                    <li><a href="info/contact.php">Contact</a></li>
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