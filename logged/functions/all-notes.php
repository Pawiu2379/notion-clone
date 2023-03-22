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

    $sql = "SELECT * FROM notepad where id_user=$id";
    $result = mysqli_query($conn,$sql);

    while ($row= mysqli_fetch_array($result)){
        echo "<div class='note'>";
        echo "<h3>Title: <br> <strong>". $row['title']."</strong></h3>";
        echo "<div class='textarea'>". $row['note']."</div>";
        echo "<a>". $row['id'] . "</a>";
        echo "</div>";
    }