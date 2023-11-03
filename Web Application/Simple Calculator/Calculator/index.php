<!-- This code is made by SM Sultan. -->

<!DOCTYPE html>
<html>
<head>
    <title>Simple Calculator</title>
</head>
<body>
    <h1>Simple Calculator web application for begainers</h1>
    <form action="index.php" method="post">
        a: <input type="number" name="a"><br>
        b: <input type="number" name="b"><br>
        select operator: <br>
        <input type="radio" name="operator[]" value="plus">Addition <br>
        <input type="radio" name="operator[]" value="minus">Subtraction <br>
        <input type="radio" name="operator[]" value="multi">Multiplication <br>
        <input type="radio" name="operator[]" value="div">Division <br>
        <input type="radio" name="operator[]" value="pow">a^b <br>
        <button name="submit">Calculate</button><br>
    </form>
</body>
</html>
    <?php
        if(isset($_POST["operator"])){
            $opt = $_POST["operator"];
            $a = $_POST["a"];
            $b = $_POST["b"];
            if($a!=null and $b!=null){
            foreach($opt as $sign){
                switch($sign){
                    case "plus":
                        echo "<br>Result is = ",$a+$b;
                        break;
                    case "minus":
                        echo "<br>Result is = ",$a-$b;
                        break;
                    case "multi":
                        echo "<br>Result is = ",$a*$b;
                        break;
                    case "div":
                        if($b==0)
                            echo "Can't not divided by 0.<br>";
                        else
                            echo "<br>Result is = ",$a/$b;
                        break;
                    case "pow":
                        echo "<br>Result is = ",$a**$b;
                        break;
                }
            }
        }
        else echo"You must be enter two number.";
    }
        else{
            echo"<br>You must be select an operator.<br>";
        }
    ?>
