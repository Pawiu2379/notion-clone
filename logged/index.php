<?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Planer</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./todov2.js"></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="subpages/calendar.php">Calendar </a></li>
                <li> <a href="subpages/todo.php">To do </a></li>
                <li> <a href="subpages/notes.php">Notes </a></li>
                <li> <a id="hello" style="text-align:center" >Hello <?php echo $_SESSION['username']?></a></li>
                <li style="float: right"><a href="../index.php">Logout</a> </li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="todo_shortcut" class="shortcut">
            <h1>To Do</h1>
            <div class ="todo">
                <?php include './functions/todo.php'; ?>
            </div>
            <div>
                <a href="subpages/todo.php" class="button" id="open-tasks"><ion-icon name="copy-outline"></ion-icon></ion-icon></a>
            </div>
        </section>
        <section id="calendar_shortcut" class="shortcut">
            <h1>Calendar</h1>
            <div class="calendar " id="calendar">
<!--                --><?php //include 'functions/create-calendar.php' ?>
            </div>
            <div id="event">

            </div>
            <div>
                <a href="subpages/calendar.php" class="button" id="add-date"><ion-icon name="reader-outline"></ion-icon></a>
            </div>
        </section>
        <section id="notes_shortcut" class="shortcut">
            <h1>Notes</h1>
            <form action="functions/save-note.php" method="post">

                <label for="title">
                Fast Note:
                </label>
                <input type="text" name="title"  id="title" class="note-title" placeholder="Set Title of your note">
                <label for="notes">
                </label><textarea autocomplete="off" id="notes" name="notes" rows="25" cols="50" placeholder="Write a note ..."></textarea>
                <button type="submit" class="button" id="save-note" ><ion-icon name="save-outline"></ion-icon></button>
                <button class="button" onclick="resetTextArea()" id="reset-note" ><ion-icon name="refresh-outline"></ion-icon></button>
                <a href="subpages/notes.php"  class="button" id="open-notes" ><ion-icon name="bookmark-outline"></ion-icon></a>
            </form>
        </section>
    </main>

<script src="script.js"></script>

</body>
</html>