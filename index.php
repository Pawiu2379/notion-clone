<?php
session_start();
//$id = $_SESSION['id'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Planer</title>
    <link rel="stylesheet" href="style.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>

    <header>
        <nav>
            <ul>
                <li><a>Calendar </a></li>
                <li> <a>To do </a></li>
                <li> <a>Notes </a></li>
                <li style="float: right"> <a>Search</a> </li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="todo_shortcut" class="shortcut">
            <h1>To Do</h1>
            <div class="to-do ">
                <?php include 'todo.php'?>
            </div>
        </section>
        <section id="calendar_shortcut" class="shortcut">
            <h1>Calendar</h1>
            <div class="calendar " id="calendar">    </div>
        </section>
        <section id="notes_shortcut" class="shortcut">
            <h1>Notatnik</h1>
            <div class="notepad" id="notepad">
             <form action='notepad.php' method ='post'>
                 <label for="message">Szybka notka:</label>
                <textarea autocomplete="off" id="message" name="message" rows="25" cols="50"></textarea>
             </form>

            </div>
            <div>
             <a class="button"><ion-icon name="add-circle-outline"></ion-icon></a>
                <a class="button" id="reset"><ion-icon name="refresh-outline"></ion-icon></a>
            </div>
        </section>
    </main>

<script src="script.js"></script>
</body>
</html>