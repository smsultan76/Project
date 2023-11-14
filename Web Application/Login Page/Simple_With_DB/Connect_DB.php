<?php
    $servername = "localhost";
    $usernname = "root";
    $password = "";
    $DBname = "test";
    try{
        $conn= mysqli_connect($servername,$usernname,$password,$DBname);
        // echo "Connected.";
    }catch(mysqli_sql_exception){
        echo "Faild";
    }
?>