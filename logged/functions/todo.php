<?php
try {
    $id = $_SESSION['id'];
    $sort = $_SESSION['sortby'];

    $servername = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'planer';
    $conn = mysqli_connect($servername,$user,$password,$dbname);
    $sql = "";
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    if($sort == 1){
    $sql = "SELECT * FROM tasks WHERE id_user = '$id' ORDER BY date ASC";

    }elseif($sort == 2){
    $sql = "SELECT * FROM tasks WHERE id_user = '$id' ORDER BY status ASC";

    }else{
    $sql = "SELECT * FROM tasks WHERE id_user= $id";
    }

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr style='border-bottom: 1px #000000 solid' id='headtable'><th>Id</th><th>Status</th><th>Task</th><th>Date</th></tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo  "<td id=".$row['id'].">". $row['id'] . "</td>";
            if ($row['status'] == 1){
                echo "<td><label for='status'></label><input class='status' type='checkbox' name='status[]' value='" . $row["id"] . "' checked></td>";
            }else{
                echo "<td><label for='status'></label><input class='status' type='checkbox' name='status[]' value='" . $row["id"] . "' ></td>";
            }
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