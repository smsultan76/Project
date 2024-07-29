<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <header>
        <?php
        if (isset($_SESSION["username"])) {
            $paget = "Welcome to school";

        } else $paget = "Student Management Project";
        echo "<h2>$paget</h2>";
        ?>
        <nav class="navigation">
            <?php
            if(isset($_SESSION["username"])){
                echo '<a href="welcome.php">Home</a>';
            }else echo '<a href="welcome/welcome.php">Home</a>';
            ?>
            <!-- <a href="">Services</a> -->
            <a href="teachers.html">Teachers</a>
            <a href="welcome/About.php">About</a>
            <button id="Pips" onclick="stdl()">Student Login</button>
            <?php
            if (isset($_SESSION["username"])) {
                echo '<button id="Pip" onclick="logout()">Logout</button>';
            } else {
                echo '<button id="Pip" onclick="toggle()">Login</button>';
            }
            ?>

        </nav>
    </header>
    <script src="script.js"></script>
</body>

</html>