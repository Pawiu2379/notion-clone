<?php
    session_start();
//    include './functions/save-note.php';
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
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a>Calendar </a></li>
                <li> <a>To do </a></li>
                <li> <a>Notes </a></li>
                <li> <a id="hello" style="text-align:center" >Hello <?php echo $_SESSION['username']?></a></li>
                <li style="float: right"> <a>Search</a> </li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="todo_shortcut" class="shortcut">
            <h1>To Do</h1>
            <div class ="todo">
                <?php include 'todo.php'; ?>
            </div>
            <div>
                <a class="button"  id="new-task"><ion-icon name="add-circle-outline"></ion-icon></a>
                <a class="button" id="remove-task"><ion-icon name="close-circle-outline"></ion-icon></a>
                <a class="button" id="edit-task"><ion-icon name="create-outline"></ion-icon></a>
            </div>
        </section>
        <section id="calendar_shortcut" class="shortcut">
            <h1>Calendar</h1>
            <div class="calendar " id="calendar">    </div>
        </section>
        <section id="notes_shortcut" class="shortcut">
            <h1>Notes</h1>
            <form action="functions/save-note.php" method="post">

                <label for="title">
                Fast Note:
                </label>
                <input type="text" name="title" value="Set title" id="title" class="note-title">
                <label for="notes">
                </label><textarea autocomplete="off" id="notes" name="notes" rows="25" cols="50">Write a note ...</textarea>
                <button type="submit" class="button" id="save-note" ><ion-icon name="save-outline"></ion-icon></button>
                <button class="button" onclick="resetTextArea()" id="reset-note" ><ion-icon name="refresh-outline"></ion-icon></button>

            </form>
        </section>
    </main>

<script src="script.js"></script>

</body>
</html>