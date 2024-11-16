<?php
require '../connnect.php';
session_start();
if(!isset($_SESSION["seller"])){
    header("Location: seller.php");
}else{
    $username = $_SESSION["seller"];
    $sql = 'SELECT * FROM sellers WHERE Username="'.$username.'"';
    $row= mysqli_fetch_assoc(mysqli_query($conn,$sql));
    $seller_id= $row["Sl"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="../img/icon.png">
    <link rel="stylesheet" href="styles.css">    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>

<body>
    <header>
        <h1> <a href="../index.php">Boi Bazar</a> </h1>
        <nav>
            <a href="../index.php">Home</a>
            <a href="">About</a>
            <button onclick="cencel()">Cencel</button>
        </nav>
    </header>
    <div id="edit">
        <h1> Enter your book info</h1>
        <form action="" method="post">
            <table id="edittable">
                <tr>
                    <th>Book Name</th>
                    <td>: <input  name="BName" required></td>
                </tr>
                <tr>
                    <th>Writer Name</th>
                    <td>: <input  name="WName" required></td>
                </tr>
                <tr>
                    <th>Edition</th>
                    <td>: <input  name="edition" required></td>
                </tr>
                <tr>
                    <th>Categorie</th>
                    <td>: <input  name="cate" required></td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td>: <input  name="dept" required></td>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <td>: <input  name="quantity" required></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>: <input  name="price" required></td>
                </tr>
            </table>
            <button type="submit" name="addbook">Add Book</button>
            <?php
            if(isset($_POST['addbook'])) {
                $BName= $_POST["BName"];
                $WName= $_POST["WName"];
                $edition= $_POST["edition"];
                $cate= $_POST["cate"];
                $dept= $_POST["dept"];
                $quantity= $_POST["quantity"];
                $price= $_POST["price"];
                $sql = "INSERT INTO `books` (`BName`, `WName`, `Edition`, `quantity`, `price`,`category`, `department`,`saller_id`)  VALUES ('$BName', '$WName', '$edition', '$quantity', '$price','$cate','$dept','$seller_id')";
                $result= mysqli_query($conn,$sql);
                echo '<script> alert("Book Successfully Added."); 
                window.location.href="seller.php"; </script>';
            }
            ?>
        </form>
    </div>
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

<script src="scripts.js"></script>

</html>