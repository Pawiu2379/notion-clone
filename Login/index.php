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
    session_start();
    $login = $_POST['login'];
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "planer";
    $tablename = "users";
    // Create connection
    $connection = mysqli_connect($servername, $username, $db_password, $dbname);
    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT login FROM $tablename WHERE login = '$login';";
    $sql1 = "SELECT password FROM $tablename WHERE password ='$password';";

    $result = mysqli_query($connection,$sql);

    if(mysqli_num_rows($result)>0){
        $result1 = mysqli_query($connection,$sql1);
        if($result1 !== NULL){
            $row = mysqli_fetch_assoc($result1);
            $db_pssword = $row['password'];
            if($password == $db_pssword){
                $_SESSION['ID'] = $row['id'];
                header("Location: ../index.html");
            }else{
                echo '<script>alert("Podane hasło jest nie prawidłowe")</script>';
            };
        }else{
            echo '<script>alert("Podane hasło jest nie prawidłowe")</script>';
        };
    }else{
        echo '<script>alert("Podany login nie istnieje spróbuje jeszcze raz albo zarejestruj sie")</script>';
    };

    mysqli_close($connection);

?>
</body>
</html>