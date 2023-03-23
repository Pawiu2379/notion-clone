<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "planer";
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$task = $_POST["task"];
$date = $_POST["date"];
$user_id = $_SESSION['id'];
echo  $user_id;

$sql = "INSERT INTO tasks (`id_user`, `task`, `date`) VALUES ('$user_id', '$task', '$date')";

if (mysqli_query($conn, $sql)) {
    echo "Task saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
header('Location: ../subpages/todo.php');