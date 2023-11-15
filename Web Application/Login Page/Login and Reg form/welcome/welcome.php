<?php
    session_start();
    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
    if(!isset($_SESSION["username"])){
        header("Location: ../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1> Hay dear ,</h1>
    <h2> You successfully Loged in.</h2>
    <?php
        echo "Hello ".$_SESSION["username"];
    ?><br><br>
    You can contuct with me <a href="About.php"> here</a>
    <hr>
    <button onclick="logout()">Logout</button>
    <script src="../script.js"></script>
</body>
</html>