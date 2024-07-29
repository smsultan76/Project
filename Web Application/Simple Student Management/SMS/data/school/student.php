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
        <h2>Students Information</h2>
        <nav>
            <a href="../../index.php">Home</a>
            <!-- <a href="">Services</a> -->
            <!-- <a href="">Department</a> -->
            <a href="../../welcome/About.php">About</a>
        </nav>
    </header>
    <div id="outer">
        <div id="inner">
            <h2>Hear is your Information</h2>
            <hr>
            <div>
                <div>
                    Serial Number <br>
                    Roll <br>
                    First Name <br>
                    Last Nmae <br>
                    Father Nmae <br>
                    Mother Name <br>
                    Registration Number <br>
                    Phone <br>
                    Email <br>
                    Address <br>
                    Session <br>
                    Addmission Date <br>
                </div>
                <div>
                    <?php
                    foreach ($data as $vl) {
                        echo ": " . $vl . "<br>";
                    }
                    $temp= $data["roll"];
                    ?>
                </div>
            </div>

        </div>

    </div>
    <hr>
    <div id="btn">
        <button onclick="fn(1)">Results</button>
        <button onclick="fn(2)">Courses</button>
    </div>
    <hr>
    <div class="outer">
        <div id="result">
            <table>
            <?php
                include("../../Connect_DB.php");
                $sql = "SELECT * FROM result WHERE c_id='$temp'";
                try{
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                        echo "<tr>
                        <th> Student Id</th>
                        <th> Semester</th>
                        <th> Points</th>
                        <th> Grade</th>
                        </tr>";
                        while($rows= mysqli_fetch_row($result)){
                            echo "<tr>";
                            echo "<td>" . $rows[0] . "</td>";
                            echo "<td>" . $rows[1] . "</td>";
                            echo "<td>" . $rows[2] . "</td>";
                            echo "<td>" . $rows[3] . "</td>";
                            echo "</tr>";
                        }
                    }
                    else echo "<h2> No result found! </h2>";
                } catch(mysqli_sql_exception){
                    echo "Could Not connect Database.";
                }
            ?>
            </table>
        </div>
    </div>
    <div class="outer">
        <div id="course">
        <table>
            <?php
                include("../../Connect_DB.php");
                $sql = "SELECT * FROM course WHERE roll='$temp'";
                try{
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                        echo "<tr>
                        <th> Student ID</th>
                        <th> Course ID</th>
                        <th> Couese Name</th>
                        <th> Department Name</th>
                        </tr>";
                        while($rows= mysqli_fetch_row($result)){
                            echo "<tr>";
                            echo "<td>" . $rows[0] . "</td>";
                            echo "<td>" . $rows[1] . "</td>";
                            echo "<td>" . $rows[2] . "</td>";
                            echo "<td>" . $rows[3] . "</td>";
                            echo "</tr>";
                        }
                    }
                    else echo "<h2> No result found! </h2>";
                } catch(mysqli_sql_exception){
                    echo "Could Not connect Database.";
                }
            ?>
            </table>
        </div>
    </div>

    <script>
        function fn(a){
            if(a==1){
                document.getElementById("result").style.display="block";
                document.getElementById("course").style.display="none";
            }
            else if(a==2){
                document.getElementById("result").style.display="none";
                document.getElementById("course").style.display="block";
            }
        }
    </script>
</body>

</html>