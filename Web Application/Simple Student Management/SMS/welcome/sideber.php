<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="profile">
                <?php
                if ($_SESSION["username"]=="smsultan76") {
                    echo '<img src="../data/pics/sm2.jpg" alt="profile_picture">';
                    echo '<h3>Sultanum Mobin</h3>';
                } else{ echo '<img src="../data/pics/default_profile.jpg" alt="profile_picture">';                
                echo '<h3>.$_SESSION["username"].</h3>';
                }
                ?>
                <p>Designer</p>
                <p>Developer</p>
            </div>
            <a href="../welcome/welcome.php">Home</a>
            <a href="../teachers.html">Our Teachers</a>
            <!-- <a href="#">People</a> -->
            <a href="#">Settings</a>

        </div>
    </div>

    </div>
</body>

</html>