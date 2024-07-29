<?php
session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../index.php");
    exit();
}
if (!isset($_SESSION["username"])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our College</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <?php
    include("header.php");
    include("sideber.php");
    ?>
    <h1>Faridpur Enginnering College</h1>
    <div id="School">

        <div class="class" id="class9">
            <img src="../data/pics/CSEb.jpg" alt="CSE building"><hr>
            <div> 
            <h2>CSE</h2>
            Name: <b>Computer Science & Engineering Department</b> <br>
            seat: 60 <br>
            </div><hr>
            <button onclick="goschool(1)">CSE Students</button>
        </div>
        <div class="class" id="class10">
            <img src="../data/pics/EEEb.jpg" alt="EEE building"><hr>
            <div> 
            <h2>EEE</h2>
            Name: <b>Electrical & Electronic Engineering Department</b> <br>
            seat: 60 <br>
            </div><hr>
            <button onclick="goschool(2)">EEE Students</button>
        </div>
        <div class="class" id="class11">
            <img src="../data/pics/CEb.jpg" alt="CE building"><hr>
            <div>
            <h2>Civil</h2>
            Name: <b>Civil Engineering Depratment</b> <br>
            seat: 60 <br>
            </div><hr>
            <button onclick="goschool(3)">CE Students</button>
        </div>
        <!-- <div class="class" id="class12">
            <img src="../data/pics/CSEb.jpg" alt="Mechanicel building"><hr>
            <div> 
            <h2>Class 12</h2>
            Name: <b>Mechanicel Engineering Deprtment</b> <br>
            seat: 60 <br>
            </div><hr>
            <button onclick="goschool(4)">Class 12 Information</button>
        </div> -->
    </div>    
    <script src="script.js"></script>
</body>

</html>