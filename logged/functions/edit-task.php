<?php
    session_start();
    $id = $_SESSION['id'];

    $servername = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'planer';
    $conn = mysqli_connect($servername,$user,$password,$dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


        foreach ($_POST['status'] as $checkboxValue) {
            $checkboxID = $checkboxValue;
            mysqli_query($conn, "UPDATE tasks set status=1 where id = $checkboxValue");

        }

        mysqli_close($conn);
        header("Location: ../subpages/todo.php");
