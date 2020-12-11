<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honest Clickbait Headlines</title>

    <style>
        body {
            background-color: lavenderblush;
            color: black;
            margin: 10%;
        }
        textarea {
            padding: 80px;
            resize: none;
        }
        button[type=submit] {
            width: 10%;
            background-color: black;
            color: white;
            padding: 8px;
            border-radius: 4px;
        }
        button[type=submit]:hover {
            background-color: lightcoral;
        }
    </style>
</head>

<body>
    <?php
        if(isset($_POST["submitted"])) {
            $clickBait = strtolower($_POST["clickBaitHeadline"]);

            $clickbait_words = array("scientists", "doctors", "hate", "stupid", "weird", "simple", "tricked", "shocked me", "you'll never believe", "hack", "epic", "unbelievable");
            $replacement_words = array("so-called scientists", "so-called doctors", "aren't threatened by", "average", "completely normal", "ineffective", "method", "is no different than the others", "you won't really be surprised by", "slightly improve", "boring", "normal");

            $honestHeadline = str_replace($clickbait_words, $replacement_words, $clickBait);
        }
    ?>

    <div>
        <h2>Honest Clickbait Headlines</h2>
        <p>Hate click bait?<br>Turn those headlines into an honest one.<br>Try this.</p>

        <div>
            <form action="" method="post">
                <textarea placeholder = "Enter click bait headline here." name="clickBaitHeadline"></textarea><br>
                <button type="submit" name="submitted">Make Honest!</button>
            </form>
        </div><br>

        <?php 
            if(isset($_POST["submitted"])) {
                echo "<strong>Original Headline</strong><h4>".($clickBait)."</h4><hr>";   
                echo "<strong>Honest Headline</strong><h4>".($honestHeadline)."</h4>";   
            }
        ?>
    </div>
</body>
</html> 