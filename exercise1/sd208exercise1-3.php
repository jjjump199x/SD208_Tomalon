<!DOCTYPE html>
<html lang="en">

<head>
    <title>Exercise No. 4</title>
</head>
    <?php
    function countWords($str) {
        $text = (explode(" ", $str));
        print_r(array_count_values($text));
    }
    
    countWords("I felt happy because I saw the others were happy and because I knew I should feel happy but I wasn’t really happy");
    ?>
<body>
    
</body>
</html>