<!DOCTYPE html>
<html lang="en">

<head>
    <title>Exercise No. 3</title>
</head>

<body>
    <?php
    function fizzbuzz($i) {
        if ($i % 3 === 0) {
            echo "Fizz";
        } 
        if ($i % 5 === 0) {
            echo "Buzz";
        }
        if ($i % 5 !== 0 && $i % 3 !== 0) {
            echo ($i);
        }
    }

    for ($i = 1; $i <= 100; $i++) {
        fizzbuzz($i);
        echo "<br>";
    }
    ?>
</body>
</html>