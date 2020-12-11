<?php
    // session_start()
    // include ("bmiCalculator.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>BMI Result</title>

    <style>
        body {
            width: 100%;
            background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRWMsWVnWyfy0-rDmzLg8_AGpTnsJdNS7PP3g&usqp=CAU0);
            background-size: cover;
            background-repeat: no-repeat;
            background-color: gray;
        }
        h2 {
            text-align: left;
            margin: 20%;
            font: Georgia;
            /* font-size: 70px; */
        }
    </style>
</head>

<body>
    <h2>
        <?php
            echo "<br> Hi! <br><br>";
            echo "You are " . $_POST["height"] . " cm tall and weigh " . $_POST["weight"] . " kg. <br>";
            echo $_POST["bmi"] . "<br><br>";
            echo $_POST["result"];
        ?>
    </h2>
</body>
</html>