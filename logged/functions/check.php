<?php
// Connect to the database
$id = $_SESSION['id'];
$sort = $_SESSION['sortby'];

$servername = 'localhost';
$user = 'root';
$password = '';
$dbname = 'planer';
$conn = mysqli_connect($servername,$user,$password,$dbname);
$sql = "";

$conn = mysqli_connect($servername, $user, $password, $dbname);

// Check if the checkbox was checked
if (isset($_POST['checkbox'])) {
    // Construct the MySQL query

    foreach ($_POST['status'] as $checkboxValue) {
        $checkboxID = $checkboxValue;
        $result = mysqli_query($conn, "UPDATE tasks set status=1 where id = $checkboxValue");

        $response = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
        }
        echo json_encode($response);
    };


}

// Close the database connection
mysqli_close($conn);
?>
