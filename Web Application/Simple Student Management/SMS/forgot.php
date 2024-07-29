<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Recover</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<style>
    .lastlink {
        margin-right: 50px;
    }

    #outer {
        display: flex;
        gap: 100px;
    }
    #outer h2{
        text-align: center;
    }

    #forgot {
        border: 2px solid black;
        padding: 10px;
        font-size: 20px;
        height: 350px;
        width: 370px;
    }
    #forgot input {
        height: 35px;
        width: 95%;
        font-size: 17px;
        padding: 5px;
        margin: 7px 0 7px 0;
    }
    #forgot button{
        height: 30px;
        margin: 20px 0 0 110px;
        cursor: pointer;
        border-radius: 5px;
        background-color: blue;
        color: white;
        transition: 0.5s;
    }
    #forgot button:hover{
        color: blue;
        background-color: white;
    }
</style>

<body>
    <header>
        <h2>Welcome to school</h2>
        <nav class="navigation">
            <a href="welcome/welcome.php">Home</a>
            <a href="">Services</a>
            <a href="">Department</a>
            <a class="lastlink" href="welcome/About.php">About</a>
        </nav>
    </header>
    <div id="outer">
        <div id="forgot">
            <h2>Require Information</h2>
            <form action="forgot.php" method="post">
                Enter Your Username:<br>
                <input type="username" name="username" placeholder="username"><br>
                Enter Your Email: <br>
                <input type="email" name="email" placeholder="email"><br>
                <button>Change Password</button>
            </form>
        </div>
        <div id="forgot">
            <h2>Enter new password</h2>
            <form action="forgot.php" method="post">
                Enter Your Username:<br>
                <input type="username" name="username" placeholder="username"><br>
                Enter Your Email: <br>
                <input type="email" name="email" placeholder="email"><br>
                <button>Change Password</button>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>