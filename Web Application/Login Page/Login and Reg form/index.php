<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <?php include("header.php"); ?>
    <h3>
        <pre>
        Hello There,
        My name is Sultanum Mobin.
        Studying in Computer Science and Engineering.
        This is my first Demo login page.
        If you want to contact with me goto about.
        Thanks
    </pre>
    </h3>
    <div id="Popup">
        <div id="Piplog">
            <div class="Pipin">
                <h2>Login</h2>
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <label for="username">User Name</label>
                    <input class="ip" type="username" name="username" placeholder="User Name" required>
                    <label for="password">Password</label>
                    <input class="ip" name="password" placeholder="Password" type="password">
                    <div id="Forget">
                        <label for="chackbox"><input type="checkbox">Remember me</label>
                        <a href="">Forgot Password?</a>
                    </div>
                    <button id="Li" name="login">Login</button>
                </form>
                <?php
                if (isset($_POST["login"])) {
                    include("Connect_DB.php");
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
                                exit();
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
            <div class="Pipin">
                <h2>Register</h2>
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <label for="email">Email</label>
                    <input class="ip" type="email" placeholder="Email" name="email" required>
                    <label for="username">User Name</label>
                    <input class="ip" type="username" name="username" placeholder="User Name" required>
                    <label for="password">Password</label>
                    <input class="ip" name="password" placeholder="Password" type="password">
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
<script src="script.js"></script>

</html>