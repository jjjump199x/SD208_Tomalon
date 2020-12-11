<?php
   session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Login</title>

    <style>
        body {
            margin: 20% 0;
            background-image: url("https://p4fastel.co.uk/wp-content/uploads/2018/09/mole-digital-login-background.jpg");;
        }
        input{
            width: 30%;
            padding: 12px 20px;
            margin: 0 0 10px 0;
            border: 1px solid gray;
            border-radius: 5px; 
        }
        input:focus {
            background-color: lightblue;
        }
        input[type=submit] {
            width: 10%;
            background-color: green;
            color: white;
            padding: 10px;
            border-radius: 4px;
        }
        input[type=submit]:hover {
            background-color: lightcoral;
        }
    </style>
    </head>

    <body>
    <center>
    <?php if (isset($_POST['loggedIn'])) {
        $_SESSION["email"] = $_POST["emailAdd"];
        $_SESSION["pass"] = $_POST["pwd"];
   
        if (isset($_SESSION["email"]) && isset($_SESSION["pass"])) {
            if (($_SESSION["email"] == $_SESSION["cEmail"]) && $_SESSION["pass"] == $_SESSION["pwd"]) {
                header('Location: bio.php');
            } else {
                echo '<script>alert("Incorrect.")</script>';
            }
        }
    }
    ?>


    <h2 style="color: white ">LOGIN</h2>
    <form action="login.php" method="POST" autocomplete="off">
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Enter email" name="emailAdd" required value=<?php echo isset($_POST["emailAdd"]) ? $_POST["emailAdd"] : ""?>>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Enter password" name="pwd" required>
        </div>
        <div>
            <input type="hidden" name="loggedIn" value="1"/>
            <input type="submit" value="Login">
        <div>
    </form>
    </center>
</body>
</html>