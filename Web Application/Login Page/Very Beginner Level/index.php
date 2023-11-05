<!DOCTYPE html>
<html>
<head>
    <title>Begainer Login</title>
</head>
<body>
    <h2>This is Home page.</h2>
    <form action="" method="post">
        <label for="username">Username: <br></label>
        <input type="username" name="Username" required> <br>
        <label for="password">Password: <br></label>
        <input type="password" name="Password" required> <br>
        <input type="Submit" name="Submit" value="Login"> <br><br>
    </form>
</body>
</html>
<?php
    if(isset($_POST["Submit"])){
        $user = $_POST["Username"];
        $pass = $_POST["Password"];
        if($user == "smsultan76" && $pass == "BD123"){
            header("Location: welcome.php");
        }
        else{
            echo "Incorrect username or password.<br>";
        }
    }
    ?>
