<?php

?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registration_form";

    $conn = mysqli_connect($servername, $username, $password, $dbname );

    if (!$conn){
        die("Connection Failed: ". mysqli_connect_error());
    }
    
//adding 
    if (isset($_POST['register'])){
        // print_r($_POST);
        if (isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['address']) and isset($_POST['remail']) and isset($_POST['password'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $address = $_POST['address'];
            $remail = $_POST['remail'];
            $password = $_POST['password'];
            $sql = "INSERT INTO user(`firstname`, `lastname`, `address`, `email`, `password`) VALUES ('$firstname', '$lastname', '$address', '$remail','$password')";
            if (mysqli_query($conn, $sql)){
                echo "New record successfully added!";
            }else {
                echo mysqli_error($conn);
            }
        }
    }
//deleting
    if (isset($_POST['delete'])){
        $id = $_POST['id'];
        $sql = "DELETE FROM user WHERE user_id = $id";
        if (mysqli_query($conn, $sql)){
            echo "User successfully deleted!";
        }else {
            echo mysqli_error($conn);
        }
    }

    //test
    if(isset($_POST["update"])){
        
        echo "<form id='toUpdate' action= 'update.php' method = 'POST'>
        <input type='hidden' name = 'id' value = '".$_POST['id']."'>
        <input type='hidden' name = 'firstname' value = '".$_POST['firstname']."'>
        <input type='hidden' name = 'lastname' value = '".$_POST['lastname']."'>
        <input type='hidden' name = 'address' value = '".$_POST['address']."'>
        <input type='hidden' name = 'email' value = '".$_POST['email']."'>
        </form>
        
        
        <script>document.getElementById('toUpdate').submit()</script>";
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <?php 
//retrieving
$sqlretrieve = "SELECT * from user";
$result = mysqli_query($conn, $sqlretrieve);
if (mysqli_num_rows($result) > 0){
    echo "<table border='1' cellspacing='0'>";
        echo "<th> Firstname </th>";
        echo "<th> Lastname </th>";
        echo "<th> Address </th>";
        echo "<th> Email </th>";
    while ($row = mysqli_fetch_assoc($result)){ 
        echo "<tr>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['email']  ."</td>";
        echo "<form action= '' method = 'POST'>";
        echo "<input type='hidden' name = 'id' value = '".$row['user_id']."'>";
        echo "<input type='hidden' name = 'firstname' value = '".$row['firstname']."'>";
        echo "<input type='hidden' name = 'lastname' value = '".$row['lastname']."'>";
        echo "<input type='hidden' name = 'address' value = '".$row['address']."'>";
        echo "<input type='hidden' name = 'email' value = '".$row['email']."'>";
        echo "<td> <input type='submit' name = 'update' value = 'update'> </td>";
        echo "<td> <input type='submit' name = 'delete' value = 'delete'> </td>";
        echo "</form>";
    }
    echo "</tr>";
        echo "</table>";
}

mysqli_close($conn);
?>

</body>
</html>