<?php
include("../../Connect_DB.php");
session_start();
if (isset($_SESSION["stdinfo"])) {

    $data = $_SESSION["stdinfo"];
} else {
    header("Location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Information</title>
</head>

<body>
    <header>
        <h2>Edit Students Information</h2>
        <nav>
            <!-- <a href="">Home</a> -->
            <a href="../eee.php">Back</a>
            <a href="../../welcome/welcome.php">Departments</a>
            <a href="../../welcome/About.php">About</a>
        </nav>
    </header>
    <div id="outer">
        <div id="inner">
            
            <h2 >Edit Information</h2><hr>
            <div>
                <div>
                Serial Number     <br>
                Roll     <br>
                First Name     <br>
                Last Nmae     <br>
                Father Nmae     <br>
                Mother Name     <br>
                Registration Number     <br>
                Phone     <br>
                Email     <br>
                Address     <br>
                Session     <br>
                Addmission Date     <br>
                </div>
                <div>
                    <div>
                    <!-- <?php
                        foreach ($data as $ky=>$vl) {
                            echo "<input name='$ky' value='$vl'>";

                        }
                        $temp = $data["roll"];
                        ?> -->
                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <imput  type="none">Enter Data:</input>

                        <input type="number" name="roll"><br>
                        <input type="text" name="firstname"><br>
                        <input type="text" name="lastname"><br>
                        <input type="text" name="fname"><br>
                        <input type="text" name="mname"><br>
                        <input type="number" name="regn"><br>
                        <input type="int" name="phone"><br>
                        <input type="email" name="email"><br>
                        <input type="address" name="address"><br>
                        <input type="text" name="session"><br>
                        <input type="date" name="addate"><br>
                        <button name="Submit">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
            
            
            <?php
                if(isset($_POST["Submit"])){
                    $roll = $_POST["roll"];
                    $firstname = $_POST["firstname"];
                    $lastname = $_POST["lastname"];
                    $fname = $_POST["fname"];
                    $mname = $_POST["mname"];
                    $regn = $_POST["regn"];
                    $phone = $_POST["phone"];
                    $email = $_POST["email"];
                    $address = $_POST["address"];
                    $session = $_POST["session"];
                    $addate = $_POST["addate"];

                    $sqle= "UPDATE eee SET roll=$roll,firstname='$firstname',lastname='$lastname',fname='$fname',mname='$mname',regn=$regn,phone=$phone,email='$email',address='$address',session=$session,addate= '$addate'
                    WHERE roll =$temp";
                    try{
                        mysqli_query($conn,$sqle);
                        echo "Successfull";
                    }catch(mysqli_sql_exception){
                        echo"Failed";
                    }
                }
            ?>
        </div>
    </div>
    
    <script>

    </script>
</body>

</html>