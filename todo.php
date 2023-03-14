<?php
    session_start();
    $id = $_SESSION['username'];

    $servername = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'planer';

    $id = 1;

    $conn = mysqli_connect($servername,$user,$password,$dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = 'SELECT * FROM tasks WHERE id_user = $id';

    $result = mysqli_query($conn, $sql);


    while($row = mysqli_fetch_array($result)){
        if ($row['status']){
            echo '';
        }
    }

?>