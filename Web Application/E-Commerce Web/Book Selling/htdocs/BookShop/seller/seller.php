<?php
require '../connnect.php';
session_start();
if (!isset($_SESSION["seller"])) {
    header("Location: login.php");
    exit;
} else {
    $username = $_SESSION["seller"];
    $sql = 'SELECT * FROM sellers WHERE Username="' . $username . '"';
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $seller_id = $row["Sl"];
}


if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: ../index.php");
    exit;
}


// delete item


if(isset($_POST["product_id"])){
    $product_id = intval($_POST["product_id"]);
    $sql_delete_img = 'DELETE FROM images WHERE Id=?'; 
    $stmt1 = $conn->prepare($sql_delete_img);
    $stmt1->bind_param("i",$product_id);
    $stmt1->execute();

    $sql_delete= 'DELETE FROM books WHERE ID=?';

        $stmt2 = $conn->prepare($sql_delete);
        $stmt2->bind_param("i",$product_id);
        if($stmt2->execute()){
        echo "Item Deleted Successfully.";
    }else{ echo "Error deleting item.";}
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Seller</title>
    <link rel="icon" href="../img/icon.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    </head>

<body>
    <header>
        <h1><a href="../index.php">Boi Bazar</a> </h1>
        <nav>
            <a href="../index.php">Home</a>
            <a href="../info/about.php">About</a>
            <?php
            if (!isset($_SESSION["seller"])) {
                echo '<button onclick="login(1)">Login</button>';
            } else {
                echo '<button onclick="login(2)">' . $_SESSION["seller"] . '</button>';
            }
            ?>
        </nav>
    </header>

    <div id="menu">
        <button onclick="addbook()">Add Books</button>
        <!-- <button>Delete</button> -->
        <button id="logout" onclick="logout()">Log out</button>
    </div>
    <div id="head">
        <h2>Your Products</h2>
    </div>
    <?php
    $sql = "SELECT `books`.*, `images`.`img1` FROM `books` 
            LEFT JOIN `images` ON `books`.`Id`=`images`.`Id`
            WHERE `books`.`saller_id`=$seller_id";
    $result = mysqli_query($conn, $sql);
    while ($rows = mysqli_fetch_assoc($result)) {
        $Id = $rows["Id"];
        echo '<div class="product" id="item_'.$Id.'">';
        echo '<div class="images">';
        if (!empty($rows['img1'])) {
            echo '<a href="../product.php?Id=' . $Id . '"><img src="data:image/jpeg;base64,' . base64_encode($rows["img1"]) . '" alt="Product 1"> </a>';
        } else {
            echo '<a href="../product.php?Id=' . $Id . '"><img src="../img/product2.jpg" alt="Product 1"></a>';
        }
        echo '</div>';
        echo '<div class="info">';
        echo '<h4>' . $rows["BName"] . '</h4>';
        echo '<i>Written by </i> ' . $rows["WName"];
        echo '<p>BDT : ' . $rows["price"] . ' TK</p>';
        echo '</div>';
        echo '<div>';
        echo '<button onclick=editimg(' . $Id . ')> Update Image </button><br>';
        echo '<button onclick=editdata(' . $Id . ')> Update Information </button>';
        echo '<button onclick=deletebook(' . $Id . ','.$seller_id.')> Delete </button>';
        echo '</div>';
        echo '</div>';
        echo '<hr>';
    }
    ?>

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
<script src="scripts.js"></script>

</html>