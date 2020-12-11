<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  <style>
   body{
    background-image: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url(pink.jpg);
   }
    h1{
      margin-top: 5%;
      font-size:60px;
      color:white;
    }
  </style>
</head>
<body >
<center>

<?php 
$error =[];
if (isset($_POST["submit"])){
  $name= $_POST["name"];
  $lName=$_POST["lastName"];
  $email=$_POST["email"];  
  $address=$_POST["address"]; 
  
  
  $total = (strlen($name));
  if ($total < 2 || $total >25) {
      array_push($error, "First name should be greater than 2 and lesser than 25");  
  }else{
    echo 
     "<p style='display: center; 
     font-size: 20px; 
     border: 1px solid; padding: 2% 2%; 
     margin-right: 30%; margin-left: 30%; 
     margin-top: 10%; color:white; border-radius: 5%'>" ."First name is " . $name ."</p>";
  }
  

  if (strlen($lName)  < 2 || strlen($lName)  > 25) { 
    array_push($error, "Last Name should be greater than 2 and lesser than 25");
  }else{
  echo 
  "<p style='display: center; 
  font-size: 20px; 
  border: 1px solid; padding: 2% 2%; 
  margin-right: 30%; margin-left: 30%; 
  margin-top: 3%; color:white; border-radius: 5%'>". "Last Name is " .  $lName ."</p>";
  }


  $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
  if (!preg_match( $pattern, $email)){
    array_push($error, "INVALID EMAIL ADDRESS");
  }
  else{
    echo 
    "<p style='display: center; 
  font-size: 20px; 
  border: 1px solid; padding: 2% 2%; 
  margin-right: 30%; margin-left: 30%; 
  margin-top: 3%; color:white; border-radius: 5%'>".  "Email Address is  " . $email . "</br>";
  }

  echo 
  "<p style='display: center; 
  font-size: 20px; 
  border: 1px solid; padding: 2% 2%; 
  margin-right: 30%; margin-left: 30%; 
  margin-top: 3%; color:white; border-radius: 5%'>". "Adress is " .$address. "<br>";

// if (!empty($error)){
//   echo $error[0];
// }
  

  foreach ($error as $value) {
    echo
    "<p style='display: center; 
    font-size: 20px; 
    border: 1px solid; padding: 2% 2%; 
    margin-right: 30%; margin-left: 30%; 
    margin-top: 3%; color:black; border-radius: 5%'>".
   "!". $value. "</br>";

}
 
}


?>

</center>

</body>
</html>