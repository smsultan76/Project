<?php
session_start();
ob_start();

if (!isset($_SESSION["username"])) {
    header("Location: ../welcome/welcome.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSE department</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../welcome/style.css">
</head>

<body>
    <?php
    include("scheader.php");
    include("../welcome/sideber.php");
    $paget = "Students of CSE department";

    ?>
    <div id="manage">
        <button onclick="showallstd()">Show all Student</button>
        <button onclick="addstudent()">Add Student</button>
        <button onclick="removestu()">Remove Student</button>
        <button onclick="editinfo()">Edit Information</button>
        <!-- <button>Show Profile</button> -->
        <div id="custom_button">
            Other Departments
            <div id="depts">
                <ul id="options">
                    <li><a href="cse.php">CSE Department</a></li>
                    <li><a href="ce.php">CE Department</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="classh2">
        <h2>Here you can show and manage EEE Department Student information</h2>
    </div>
    <?php
    function submsg($data, $color)
    {
        echo '<div id="classh2" style="color:' . $color . ';">
                <h2> ' . $data . ' </h2>
                </div>';
    }
    ?>
    <div id="showallstd">
        <table id="table">
            <?php
            include("../Connect_DB.php");
            $sql = "SELECT * FROM eee";
            try {
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "<tr>
                <th>Roll</th>
                <th>First Name</th>
                <th>Last Nmae</th>
                <th>Father Nmae</th>
                <th>Mother Name</th>
                <th>Registration Number</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Session</th>
                <th>Addmission Date</th>
            </tr>";
                    while ($rows = mysqli_fetch_row($result)) {
                        echo "<tr>";
                        echo "<td>" . $rows[1] . "</td>";
                        echo "<td>" . $rows[2] . "</td>";
                        echo "<td>" . $rows[3] . "</td>";
                        echo "<td>" . $rows[4] . "</td>";
                        echo "<td>" . $rows[5] . "</td>";
                        echo "<td>" . $rows[6] . "</td>";
                        echo "<td>" . $rows[7] . "</td>";
                        echo "<td>" . $rows[8] . "</td>";
                        echo "<td>" . $rows[9] . "</td>";
                        echo "<td>" . $rows[10] . "</td>";
                        echo "<td>" . $rows[11] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo '<div id="classh2">
                            <h2>No Student Data found!</h2>
                            </div>';
                }
            } catch (mysqli_sql_exception) {
                echo '<div id="classh2">
                            <h2>Could not Connect to database!</h2>
                            </div>';
            }
            ?>
        </table>
    </div>

    <div id="addstudents">
        <div id="addstudent">
            <h2>Enter Student Information</h2>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <label for="rolln">Roll Number:</label>
                <input type="number" name="roll"><br>
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname"><br>
                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname"><br>
                <label for="fname">Father Name:</label>
                <input type="text" name="fname"><br>
                <label for="mname">Mother Name:</label>
                <input type="text" name="mname"><br>
                <label for="regn">Registration Number:</label>
                <input type="number" name="regn"><br>
                <label for="phone">Phone Number:</label>
                <input type="int" name="phone"><br>
                <label for="email">Email:</label>
                <input type="email" name="email"><br>
                <label for="address">Address:</label>
                <input type="address" name="address"><br>
                <label for="session"> Session:</label>
                <input type="text" name="session"><br>
                <label for="addate">Addmission Time:</label>
                <input type="date" name="addate"><br>
                <input type="submit" class="submit" name="submit" value="Add Student">
            </form>
        </div>
    </div>
    <?php
            if (isset($_POST["submit"])) {
                include("../Connect_DB.php");
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                    $sql = "SELECT * FROM eee WHERE roll ='$roll' OR regn ='$regn'";
                    if (mysqli_fetch_assoc(mysqli_query($conn, $sql))) {
                        submsg("Faild! Roll or Registration number already exist.","red");
                    } else {
                        try {
                            $sql = "INSERT INTO eee(roll, firstname, lastname, fname, mname,	regn, phone, email,	`address`, `session`,addate)
                                        VALUES($roll,'$firstname', '$lastname', '$fname', '$mname', $regn, '$phone', '$email', '$address', $session,'$addate')";
                            mysqli_query($conn, $sql);
                            submsg("Successful","green");
                            exit();
                        } catch (mysqli_sql_exception) {
                            echo "<script> 
                                        alert('Faild');
                                        </script>";
                            exit();
                        }
                    }
                }
            }
            ?>
    <div id="removestu">
        <div id="remstu">
            <h2> Enter Information</h2>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="rolln">Roll Number:</label>
                <input type="number" name="rroll" placeholder="Enter Roll Number"><br>
                <label for="regn">Registration Number:</label>
                <input type="number" name="rregn" placeholder="Enter Registration Number"><br>
                <input type="submit" class="submit" name="rsubmit" value="Delete">
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST["rsubmit"])) {
        include("../Connect_DB.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $roll = $_POST["rroll"];
            $reg = $_POST["rregn"];
            $sql = "SELECT * FROM `eee` WHERE roll=$roll && regn=$reg";
            try {
                if (mysqli_fetch_assoc(mysqli_query($conn, $sql))) {
                    $sql2 = "DELETE FROM `eee` WHERE roll=$roll";
                    mysqli_query($conn, $sql2);
                    submsg("Successfully Removed", "red");
                } else {
                    submsg("Failed", "blue");
                }
            } catch (mysqli_sql_exception) {
                submsg("Invalid Data", "red");
            }
        }
    }
    ?>
    <div id="Edit">
        <div id="editinfo">
            <h2>Edit Information</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="rolln">Roll Number:</label>
            <input type="number" name="eroll" placeholder="Enter Roll">   
            <input type="submit" class="submit" name="esubmit" value="Search">
            </form>
            <?php
            if (isset($_POST["esubmit"])) {
                $eroll = $_POST["eroll"];
                $sql = "SELECT * FROM eee WHERE roll='$eroll'";
                if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {
                    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                        session_start();
                        $_SESSION["stdinfo"] = $result;
                        header("Location: edit/eeeedit.php");
                } else {
                    echo "Data not found";
                }
            }
            ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>