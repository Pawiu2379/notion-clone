<?php
    function removenote(){

            $servername = 'localhost';
            $user = 'root';
            $password = '';
            $dbname = 'planer';

            $conn = mysqli_connect($servername, $user, $password, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $id = $_SESSION['id'];
            $note = $_POST['textarea'];
            $title = $_POST['title'];


            $sql = "SELECT title, note from notepad where id_user = $id";


           $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)){
//           ----------------------------------------------------------------------------------------------------
            }
            mysqli_close($conn);

    }