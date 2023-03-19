<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawel Koc</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
    $login = $_POST['login'];
    $newPassword = $_POST['newPassword'];
    $submitPassword = $_POST['submitPassword'];

    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "planer";
    $tablename = "users";
    $connection = mysqli_connect($servername, $username, $db_password, $dbname);
    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if($newPassword ==$submitPassword){

        $sql = "UPDATE $tablename SET password='$newPassword' WHERE login='$login';";

        $result = mysqli_query($connection,$sql);

        echo "<script>alert('Twoje hasło zostało zmienione')</script>";
        header("Location: index.php");
    }else{
        echo "Podane hasła sie nie zgadzają";
        echo "<a href='changePassword.html'>Powrót</a>";
    }
    
    mysqli_close($connection);
?>
</body>
</html>