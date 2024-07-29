<?php
include("Connect_DB.php");
ob_start();
if(isset($_SESSION["username"])) {
    header("Location: welcome/welcome.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php include("header.php");  ?>
    
    <div class="container">
        <h2 style="text-align: center;">Our Departments</h2>

        <div class="department">
            <h3>Computer Science and Engineering (CSE)</h3>
            <img src="data/pics/CSEb.jpg" alt="CSE Department">
            <p class="department-description">
                The Department of Computer Science and Engineering (CSE) offers undergraduate and graduate programs in computer science. It focuses on areas such as software engineering, artificial intelligence, data science, and cybersecurity.
            </p>
        </div>

        <div class="department">
            <h3>Electrical and Electronic Engineering (EEE)</h3>
            <img src="data/pics/EEEb.jpg" alt="EEE Department">
            <p class="department-description">
                The Department of Electrical and Electronic Engineering (EEE) provides education and research opportunities in electrical engineering, electronics, and related fields. Students learn about power systems, electronics, control systems, and more.
            </p>
        </div>

        <div class="department">
            <h3>Civil Engineering (CE)</h3>
            <img src="data/pics/CEb.jpg" alt="CE Department">
            <p class="department-description">
                The Department of Civil Engineering (CE) offers programs in civil engineering, focusing on structural engineering, transportation engineering, environmental engineering, and construction management. Students gain practical skills and knowledge in designing and constructing infrastructure projects.
            </p>
        </div>
    </div>

    <h3>
        <!-- <pre>
        Hello There,
        My name is Sultanum Mobin.   </pre> -->
        <div id="stdlog">
            <h2>Student Login </h2>
            <form action="<?php htmlspecialchars(($_SERVER["PHP_SELF"])) ?>" method="post">
                <label for="roll">Roll:
                    <input type="number" name="roll">
                </label>
                <label for="regno">Registration Number:
                    <input type="number" name="regno">
                </label>
                <label for="email">Email:
                    <input type="email" name="email">
                </label>
                <label for="option">Select Department:
                    <select name="selectclass" id="selectclass">
                        <option value="cse">CSE</option>
                        <option value="eee">EEE</option>
                        <option value="ce">CE</option>
                    </select>
                </label>
                <input type="submit" name="stdlogin" value="Login">
            </form>
            <?php
            if (isset($_POST["stdlogin"])) {
                $cls = $_POST["selectclass"];
                $roll = $_POST["roll"];
                $reg = $_POST["regno"];
                $email = $_POST["email"];
                $sql = "SELECT * FROM $cls WHERE roll='$roll'";
                if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {
                    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                    if ($result["regn"] == $reg && $result["email"] == "$email") {
                        session_start();
                        $_SESSION["stdinfo"] = $result;
                        header("Location: data/school/student.php");
                        exit();
                        foreach ($result as $ky => $vl) {
                            echo $ky . "==>" . $vl . "<br>";
                        }
                    } else {
                        echo "Do not match data";
                    }
                } else {
                    echo "Data not found";
                }
            }
            ?>
        </div>
    </h3>
    <div id="Popup">
        <div id="Piplog">
        <button id="crossbtn" onclick="crossbutton()">x</button>
            <div class="Pipin">
                <h2>Login</h2>
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <label for="username">User Name</label>
                    <input class="ip" type="username" name="username" placeholder="Enter username" required>
                    <label for="password">Password</label>
                    <input class="ip" name="password" placeholder="Enter your password" type="password">
                    <div id="Forget">
                        <label for="chackbox"><input type="checkbox">Remember me</label>
                        <a href="forgot.php">Forgot Password?</a>
                    </div>
                    <button id="Li" name="login">Login</button>
                </form>
                <?php
                if (isset($_POST["login"])) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $username = $_POST["username"];
                        $password = $_POST["password"];
                        $sql = "SELECT * FROM logins WHERE username='$username'";
                        try {
                            $chk = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($chk);
                            if (password_verify($password, $row['password'])) {
                                session_start();
                                $_SESSION["username"] = $username;
                                header("Location: welcome/welcome.php");
                            } else {
                                echo "<script> 
                                alert('Username/Password error!');
                                </script>";
                            }
                            mysqli_close($conn);
                        } catch (mysqli_sql_exception) {
                            echo "Faild";
                        }
                    }
                }
                ?>
            </div>
        </div>
        <div id="Pipreg">
        <button id="crossbtn" onclick="crossbutton()">x</button>
            <div class="Pipin">
                <h2>Register</h2>
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <label for="email">Email</label>
                    <input class="ip" type="email" placeholder="Enter your email" name="email" required>
                    <label for="username">User Name</label>
                    <input class="ip" type="username" name="username" placeholder="Enter a username" required>
                    <label for="password">Password</label>
                    <input class="ip" name="password" placeholder="Enter new password" type="password">
                    <input type="checkbox" id="termsallow" onchange="termsallow()" required>Agree to the <a href="">Terms and Conditions</a>
                    <button id="regbtn" name="register">Register</button>
                </form>
                <?php
                if (isset($_POST["register"])) {
                    include("Connect_DB.php");
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $username = $_POST["username"];
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                        $sql = "SELECT * FROM logins WHERE username='$username'";


                        if (mysqli_fetch_assoc(mysqli_query($conn, $sql))) {
                            echo "<script> 
                                alert('Username already exist. Registration Unsuccessful.');
                                    </script>";
                        } else {
                            try {
                                $password = password_hash($password, PASSWORD_DEFAULT);
                                $sql = "INSERT INTO logins(username,email,password)
                                    VALUES('$username','$email','$password')";
                                $chk = mysqli_query($conn, $sql);
                                echo "<script> 
                                alert('Registration Successful. login Now.');
                                    </script>";
                            } catch (mysqli_sql_exception) {
                                echo "Registration Faild";
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
<?php

if(isset($_SESSION["username"])) {
    header("Location: welcome/welcome.php");
    exit();
}
?>
<script src="script.js"></script>

</html>