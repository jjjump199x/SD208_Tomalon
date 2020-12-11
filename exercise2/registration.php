<?php
   session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title>Register</title>

   <style>
      body {
         margin: 15% 0;
         background-color: black;
      }
      p {
         position: center;
      }
      input{
         width: 30%;
         padding: 12px 20px;
         margin: 0 50px 10px 8px ;
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
   <?php if (isset($_POST['submitted'])) {
      
      $_SESSION["fName"] = $_POST["firstname"];
      $_SESSION["lName"] = $_POST["lastname"];
      $_SESSION["add"] = $_POST["address"];
      $_SESSION["emailAd"] = $_POST["emailAddress"];
      $_SESSION["cEmail"] = $_POST["confirmEmailAdd"];
      $_SESSION["pwd"] = $_POST["password"];
      $_SESSION["cPass"] = $_POST["confirmPassword"];

      if (isset($_SESSION["fName"]) &&
      isset($_SESSION["lName"]) &&
      isset($_SESSION["add"]) &&
      isset($_SESSION["emailAd"]) &&
      isset($_SESSION["cEmail"]) &&
      isset($_SESSION["pwd"]) &&
      isset($_SESSION["cPass"])) {
         if ($_SESSION["emailAd"] == $_SESSION["cEmail"] && $_SESSION["pwd"] == $_SESSION["cPass"]) {
            // $header = 'Location: login.php?email='.$_POST["emailAddress"].'&password='.$_POST["password"];
            // header($header);
            header('Location: login.php');
         } else {
            echo '<script>alert("Password doesn\'t match.")</script>';
         }
      }
   }
   ?>

      <div style="width: 60%; background-color: whitesmoke; border-radius: 6px">
         <h2 style="text-align:center"><br>Registration Form</h2>
         <form action="registration.php" method="POST" autocomplete="off">
            <input type="text" name="firstname" placeholder="First name" required value=<?php echo isset($_POST["firstname"]) ? $_POST["firstname"] : ""?>><br>
            <input type="text" name="lastname" placeholder="Last name" required value=<?php echo isset($_POST["lastname"]) ? $_POST["lastname"] : ""?>><br>
            <input type="text" name="address" placeholder="Address" required value=<?php echo isset($_POST["address"]) ? $_POST["address"] : ""?>><br>
            <input type="text" name="emailAddress" placeholder="Email Address" required value=<?php echo isset($_POST["emailAddress"]) ? $_POST["emailAddress"] : ""?>><br>
            <input type="text" name="confirmEmailAdd" placeholder="Confirm Email Address" required value=<?php echo isset($_POST["confirmEmailAdd"]) ? $_POST["confirmEmailAdd"] : ""?>><br>
            <input type="password" name="password" placeholder="Password" required value=<?php echo isset($_POST["password"]) ? $_POST["password"] : ""?>><br>
            <input type="password" name="confirmPassword" placeholder="Confirm Pasword" required><br>
            <input type="hidden" name="submitted" value="1"/>
            <input type="submit" value="Submit">
         </form>
      </div>
   </center>
</body>
</html>