<?php

            $servername = 'localhost';
            $user = 'root';
            $password = '';
            $dbname = 'planer';

            $conn = mysqli_connect($servername, $user, $password, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $id = $_SESSION['id'];

            $taskid = $_POST['delete'];


            $sql = "DELETE FROM tasks where id=$taskid";


           $result = mysqli_query($conn, $sql);
           if($result){
               echo "usunięto pomyslnie";
           }
            mysqli_close($conn);
            header('Location: ../subpages/todo.php');