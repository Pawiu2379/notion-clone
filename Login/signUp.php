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
    $name = $_POST['name'];
    $secondName = $_POST['secondName'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $number = $_POST['phone'];


    
    // echo "$name $secondName $email $password $news $company $street $postCode $city $country $number"; 
    //mysql connestion
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

    $sql = "INSERT INTO $tablename(`name`, `secondName`,`login`,`password`,`number`)
     VALUES ('$name','$secondName','$login','$password','$number');";


   if (mysqli_query($connection, $sql)) {
        echo "<script>alert('pomyślnie zalogowano')   </script>";
        header("Location: index.php");
        echo "<script>console.log('New record created successfully')</script>";
    } else {
        echo "<script>console.log('Error: " . $sql . "<br>" . mysqli_error($connection) + "')<script>";
    }

    mysqli_close($connection);
?>
</body>
</html>




