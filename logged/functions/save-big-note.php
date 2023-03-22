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

$title = $_POST["title"];
$notes = $_POST["notes"];
$user_id = $_SESSION['id'];
echo  $user_id;

$sql = "INSERT INTO notepad (`id_user`, `title`, `note`) VALUES ('$user_id', '$title', '$notes')";

if (mysqli_query($conn, $sql)) {
    echo "Note saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
header('Location: ../subpages/notes.php');