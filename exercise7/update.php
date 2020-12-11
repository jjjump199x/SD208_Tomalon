<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "registration_form";

        $conn = mysqli_connect($servername, $username, $password, $dbname );

        if (!$conn){
            die("Connection Failed: ". mysqli_connect_error());
        }
        print_r($_POST);
    if (isset($_POST['updateUSer'])){
        
        $lname = $_POST['lastname'];
        $id = $_POST['ids'];
        $sql = "UPDATE `user` set `lastname` = '$lname' where `user_id`= " . $id;
        if (mysqli_query($conn, $sql)){
            echo "User successfully updated!";
            header('Location: form_handler.php');
        }else {
            echo mysqli_error($conn);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   

<style>
    .grid-container {
        display: grid;
        grid-template-columns: auto 97%auto auto;
        grid-gap: 10px;
        padding: 10px;
        background-image: url('bg.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        margin-top: 10%;
        margin-left: 30%;
        margin-right: 30%;
    }
    
    .register {
        font-size: 250%;
        font-family: Georgia, 'Times New Roman', Times, serif;
        text-align-last: center;
    }
    
    .inline {
        display: inline;
    }
    
    .inline input {
        padding: 2% 2%;
        margin-left: 6%;
    }
    
    .input {
        padding: 2% 2%;
        margin-left: 6%;
        width: 84%;
    }
</style>

<body>

    <div class="grid-container">
        <div></div>
        <div>
            <form action="update.php" method="POST">
                <p class="register">Register</p>
                <span class="inline">
                <!-- <?php
                    // $firstname = $_POST["firstname"];
                    // $lastname = $_POST["lastname"];
                    // $address = $_POST["address"];
                    // // $email = $_POST["email"];
                    // echo $firstname, $lastname,   $address, $email
                ?> -->
                 <input type="hidden" name="ids" value="<?php echo $_POST['id']; ?>">
                    <input   placeholder="Firstname" type="text" id="firstname" name="firstname" required value = "<?php echo (isset($_POST['firstname']))?$_POST['firstname']: ""; ?>">
                    <input   placeholder="Lastname" type="text" id="lastname" name="lastname" required value = "<?php echo (isset($_POST['lastname']))?$_POST['lastname']: ""; ?>"><br><br><br>
                </span>
                <input class="input" placeholder="Address" type="text" name="address" required value =  "<?php echo  (isset($_POST['address']))?$_POST['address']:"" ; ?>" ><br><br><br>
                <input class="input" placeholder="Email" type="text" id="email" name="remail" required value =  "<?php echo  (isset($_POST['email']))?$_POST['email']:"" ; ?>" ><br><br><br>
                <input class="input" placeholder="Password" type="password" id="password" name="password" required ><br><br><br>
                <center>
                    <input name ="updateUSer" type="submit" style="padding: 2% 24%; width: 88%; font-size: 100%; background-color:rgb(80, 130, 20); color: white;" value="update">
                </center>
                <br><br>
                <input style="float: left; margin-left: 22%;" id="remember" type="checkbox">
                <label style=" font-family: Arial, Helvetica, sans-serif;" for="remember">I accept the Terms of Use & Privay Policy</label>
                <br><br>
            </form>
        </div>
    </div>
</body>

</html>