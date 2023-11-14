<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <header>
        <h2>Simple Login form</h2>
        <nav class="navigation">
            <a href="welcome/about.php">About</a>
            <button id="Pip" onclick="toggle()">Login</button>
        </nav>
    </header>
    <div id="Pipin">
        <h2>Login</h2>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <div id="Loginbox">
                <label for="email">User Name</label>
                <input class="ip" type="username" name="username" placeholder="User Name" required>
                <label for="password">Password</label>
                <input class="ip" name="password" placeholder="Password" type="password">
                <div id="Forget">

                    <label for="chackbox"><input type="checkbox">Remember me</label>
                    <a href="">Forgot Password?</a>
                </div>
                <button id="Li" name="login">Login</button>
            </div>
        </form>

        <?php
        if (isset($_POST["login"])) {
            include("Connect_DB.php");
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $sql = "SELECT * FROM login WHERE username='$username'";
                try {
                    $chk = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($chk);
                    if ($password == $row["password"]) {
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
</body>
<script src="script.js"></script>

</html>