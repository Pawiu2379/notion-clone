<?php
$query = $_POST['query'];

// dane połączenia z bazą danych
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "planer";
// utworzenie połączenia z bazą danych
$conn = new mysqli($servername, $username, $password, $dbname);

// sprawdzenie poprawności połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// wykonanie zapytania SQL
if ($conn->query($query) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error inserting record: " . $conn->error;
}

// zamknięcie połączenia z bazą danych
$conn->close();
?>