<table>
<?php
    include("../Connect_DB.php");
    $sql = "SELECT * FROM class9";
    try{
        $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
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
            while($rows = mysqli_fetch_row($result)){
                echo "<tr>";
                echo "<td>".$rows[1]."</td>";
                echo "<td>".$rows[2]."</td>";
                echo "<td>".$rows[3]."</td>";
                echo "<td>".$rows[4]."</td>";
                echo "<td>".$rows[5]."</td>";
                echo "<td>".$rows[6]."</td>";
                echo "<td>".$rows[7]."</td>";
                echo "<td>".$rows[8]."</td>";
                echo "<td>".$rows[9]."</td>";
                echo "<td>".$rows[10]."</td>";
                echo "<td>".$rows[11]."</td>";
                echo "</tr>";
            }
    }else{
        echo "<h2> No Student Data found! </h2>";
    }
    }catch(mysqli_sql_exception){
        echo "<h2> Could not Connect to database! </h2>";
    }
?></table>