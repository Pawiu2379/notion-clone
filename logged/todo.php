<?php
try {


//    $id = $_SESSION['id'];
    $id = $_SESSION['id'];

    $servername = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'planer';

    $conn = mysqli_connect($servername,$user,$password,$dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM tasks WHERE id_user = '$id'";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Status</th><th>Zadanie</th><th>Data</th></tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><label for='status'></label><input class='status' type='checkbox' name='status' value='" . $row["status"] . "'></td>";
            echo "<td>" . $row["task"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Brak danych do wyświetlenia";
    }



}catch(Exception $e){
    echo "<h2 class='error_php' > To do list is not available now</h2>";
    echo "<script> console.log". $e ->getMessage(). "</script>";
}
mysqli_close($conn);
?>