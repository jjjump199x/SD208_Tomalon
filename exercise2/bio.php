<?php
   session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Personal Data</title>

    <style>
        body {
            width: 100%;
            background-color: lavenderblush;
        }
        div {
            background-color: black;
        }
        h2 {
            text-align: center;
            margin: 10%;
            font: Georgia;
            font-size: 70px;
        }
    </style>
</head>

<body>
    <h2>
        <?php
            echo "<br>";
            echo "WELCOME, " . $_SESSION["fName"] . " " . $_SESSION["lName"] . "!☺";
        ?>
    </h2>
</body>
</html>