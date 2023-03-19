    <?php
        session_start();
        function savenote(){
            $servername = 'localhost';
            $user = 'root';
            $password = '';
            $dbname = 'planer';

            $conn = mysqli_connect($servername, $user, $password, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $id = $_SESSION['id'];
            $notes = $_POST['notes'];
            $title = $_POST['title'];




                $sql = "INSERT INTO notepad(`id_user`,`title`,`note`) VALUES ('$id','$title','$notes')";

                mysqli_query($conn, $sql);

                mysqli_close($conn);

    }
        savenote();

        header("Location: ../index.php" );
        exit();