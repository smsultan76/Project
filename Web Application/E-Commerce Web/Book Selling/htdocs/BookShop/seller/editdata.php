<?php
include("../connnect.php");
session_start();
if(!isset($_SESSION["seller"])){
    header("Location: seller.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book Data</title>
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
            <h1>Edit your Book Information</h1>
            <?php
            $Id=$_GET["Id"];
            $sql = 'SELECT * FROM books Where Id="' . $Id . '"';
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            ?>
            <form action="" method="post">
                <table id="edittable">
                    <tr>
                        <td>Book ID</td>
                        <td>: <input name="Id" value="<?php echo $row["Id"]; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td>Book Name</td>
                        <td>: <input type="text" name="BName" value="<?php echo $row["BName"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Writter Name</td>
                        <td>: <input type="text" name="WName" value="<?php echo $row["WName"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Edition</td>
                        <td>: <input name="edition" value="<?php echo $row["Edition"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td>: <input name="quantity" value="<?php echo $row["quantity"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Categories</td>
                        <td>: <input name="cate" value="<?php echo $row["category"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td>: <input name="dept" value="<?php echo $row["department"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>: <input name="price" value="<?php echo $row["price"]; ?>"></td>
                    </tr>
                </table>
                <button type="submit" name="update">Update</button>
            </form>
            <?php
            if (isset($_POST["update"])) {
                $BName= $_POST["BName"];
                $WName= $_POST["WName"];
                $edition= $_POST["edition"];
                $cate= $_POST["cate"];
                $dept= $_POST["dept"];
                $quantity= $_POST["quantity"];
                $price= $_POST["price"];
                $sql ="UPDATE `books` SET `BName` = '$BName', `WName` = '$WName', `Edition` = '$edition', `quantity` = '$quantity', `price` = '$price', `category` = '$cate', `department` = '$dept' WHERE `books`.`Id` = '$Id'";
                $conn->query($sql);
                echo '<script> alert("Update Successful."); 
                window.location.href="seller.php"; </script>';
            }
            ?>
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