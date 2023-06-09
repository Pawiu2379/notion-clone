<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Planer</title>
    <link rel="stylesheet" href="notesstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="calendar.php">Calendar </a></li>
            <li> <a href="todo.php">To do </a></li>
            <li> <a href="notes.php">Notes </a></li>
            <li> <a id="hello" style="text-align:center" >Hello <?php echo $_SESSION['username']?></a></li>
            <li style="float: right"> <a href="../index.php">Back to main</a></li>
        </ul>
    </nav>
</header>
<main>
<section id="notes_shortcut" class="shortcut">
    <h1>Notes</h1>
    <form action="../functions/save-big-note.php" method="post">

        <label for="title">
            Fast Note:
        </label>
        <input type="text" name="title"  id="title" class="note-title" placeholder="Set Title of your note">
        <label for="notes">
        </label><textarea autocomplete="off" id="notes" name="notes" rows="25" cols="50" placeholder="Write a note ..."></textarea>
        <button type="submit" class="button" id="save-note" ><ion-icon name="save-outline"></ion-icon>&nbsp; Save note</button>
    </form><br>
        <button class="button" onclick="resetTextArea()" id="reset-note" ><ion-icon name="refresh-outline"></ion-icon>&nbsp; Clear note</button>
</section>
    <section class="shortcut">
        <h1>All Notes</h1>
        <div class="all-notes">
        <?php include '../functions/all-notes.php'?>
        </div>
    </section>

    <section class="shortcut">
        <h1>Delete Note</h1>
        <form action="../functions/remove-note.php" method="post">
            <label for="delete">Choose number of note to delete:<br></label>
                <input type="number" name="delete" id="delete"><br>
            <button type="submit" class="button" id="save-note" ><ion-icon name="save-outline"></ion-icon>&nbsp; Delete note</button>
        </form>
    </section>
</main>
<script src="../script.js"></script>
</body>
</html>
