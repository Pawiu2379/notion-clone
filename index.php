<?php
session_start();
?>
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
    $sql = "SELECT * FROM $tablename WHERE login = '$login';";
    $sql1 = "SELECT * FROM $tablename WHERE password ='$password';";

    $result = mysqli_query($connection,$sql);

    if(mysqli_num_rows($result)>0){
        $result1 = mysqli_query($connection,$sql1);
        if($result1 !== NULL){
            $row = mysqli_fetch_assoc($result1);
            $row1 = mysqli_fetch_assoc($result);
            $db_pssword = $row['password'];
            if($password == $db_pssword){
                $_SESSION['id'] = $row1['id'];
                $_SESSION['username'] = $row1['name'];
                header("Location: ./logged/index.php");
            }else{
                echo '<script>alert("Podane hasło jest nie prawidłowe")</script>';
                header('Location: index.php');
            };
        }else{
            echo '<script>alert("Podane hasło jest nie prawidłowe")</script>';
            header('Location: index.php');
        };
    }else{
        echo '<script>alert("Podany login nie istnieje spróbuje jeszcze raz albo zarejestruj sie")</script>';
        header('Location: signUp.html');

    };

    mysqli_close($connection);

?>
</body>
</html>