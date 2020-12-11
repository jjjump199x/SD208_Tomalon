<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LOGIN</title>
    <?php include 'form_handler.php'; ?>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <form class="register-form" action="form_handler.php" method="post" >
                <input type="text" placeholder="Enter First Name" name="name" id="" >
                <input type="text" placeholder="Enter Last Name" name="lastName" id="" >
                <input type="text" placeholder="Enter Email" name="email" id="" >
                <input type="text" placeholder="Enter Address" name="address" id="">
                <input type="submit" value="SUBMIT" name="submit" >  
                
            </form>
      </div>
</div>



</body>
</html>