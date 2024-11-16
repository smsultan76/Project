<?php
session_start();
require '../connnect.php';

// Check if the user is logged in
if (!isset($_SESSION['UserName'])) {
    header("Location: ../user/login.php"); // Redirect to login page if not logged in
    exit();
}
if (isset($_POST["product_id"])) {
    $product_id = $_POST["product_id"];
} else {
    header("Location: ../index.php");
}
// Get the logged-in user ID
$user_name = $_SESSION['UserName'];
$sql = 'SELECT `SL` FROM `users` WHERE `UserName`=' . '"' . $user_name . '"';
$row = mysqli_fetch_assoc($conn->query($sql));
$user_id = $row["SL"];

// Check if the user has added an address
$sql_address = "SELECT * FROM address WHERE `SL` = ?";
$stmt = $conn->prepare($sql_address);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    header("Location: ../user/profile.php");
    exit();
}

// If address exists, proceed to payment or checkout section
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>

<body>
    <header>
        <h1> Boi Bazar</h1>
        <nav>
            <a href="../index.php">Home</a>
            <!-- <a href="">Contact</a> -->
            <a href="../user/cart.php">Cart</a>
            <!-- <a href="">About</a> -->
        </nav>
    </header>
    <h2>Checkout and Payment</h2>
    <div id="product">
        <?php
        echo '<div id="image">';
        // echo $product_id;
        // echo $user_id;
        $sql = "SELECT `books`.*, `images`.`img1` FROM `books` 
LEFT JOIN `images` ON `books`.`Id`=`images`.`Id`
WHERE `books`.`Id`=$product_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo '<img src="data:image/jpg;base64,' . base64_encode($row["img1"]) . '"alt="Product 1">';
        echo "</div>";
        echo '<div id="data">';
        echo '<h3>' . $row["BName"] . '</h3>';
        echo '<div id="price" data-info="' . $row["price"] . '">Price: ' . $row["price"] . ' BDT</div> <br><br>';
        // echo '<script>
        //         var price='.$row["price"].'
        //         document.getElementById("tprice").value = price;
        //         </script>';
        echo '<div id="quantity">
        Quantity: <button onclick="quantity(1)">-</button>
        <input id="quan" value="1" disabled>
        <button onclick="quantity(2)">+</button>
    </div> <br>';
        echo 'Standard Delivery fee: 100 TK';
        echo "</div>";

        ?>

    </div>
    <div id="payment">
        <form action="payment_processing.php" method="POST">
            
            <input type="hidden" value="<?php echo $user_id?>" name="uid">
            <input type="hidden" value="<?php echo $product_id?>" name="pid">
            <input type="hidden" id="quanty" name="quanty">
            <input type="hidden" id="unitPrice" name="unitprice">
            <input type="hidden" value="100" name="delivery">
            Total Amount: <input type="" name="tprice" id="tprice" disabled> Tk<br>
            <button type="submit">Proceed to Payment</button>
        </form>
    </div>
    <!-- Add your payment gateway form here -->

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
<script src="script.js">
    // document.getElementById("tprice").value = price;
</script>

</html>