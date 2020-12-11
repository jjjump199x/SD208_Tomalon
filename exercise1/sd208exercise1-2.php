<!DOCTYPE html>
<html lang="en">

<head>
    <title>Exercise No. 2</title>
</head>

<body>
    <center><h1>CHESS BOARD</h1>
    <table style="margin: auto">

    <?php
        for ($row = 1; $row <= 8; $row++) {
            echo "<tr>";
            for ($col = 1; $col <= 8; $col++) {
                $totalCell = $row + $col;
                if ($totalCell % 2 == 0) {
                    echo "<td style='border: 1px solid; height:90px; width:90px; background-color: white'></td>";
                } else {
                    echo "<td style='border: 1px solid; height:90px; width:90px; background-color: black'></td>";
                }
            }
            echo "</tr>";
        }
    ?>
    </table></center>
</body>
</html>