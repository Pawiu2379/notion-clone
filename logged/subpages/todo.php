<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Planer</title>
    <link rel="stylesheet" href="todostyle.css">
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
            <li style="float: right"> <a>Search</a> </li>
        </ul>
    </nav>
</header>
<main>
<section id="todo_shortcut" class="shortcut">
            <h1>To Do</h1>
        <form action="../subpages/todo.php" method="post">
            <label for="sort">
                <select name="sort" id="sort">Sort By:
                    <option value="1">By date</option>
                    <option value="2">By status</option>
                </select>
                    <button class="button" type="submit"></button>
            </label>
        </form>
            <div class ="todo">
                <?php include '../functions/todo.php'; ?>
            </div>
            <div>
                <a href="../subpages/todo.php" class="button" id="open-tasks"><ion-icon name="copy-outline"></ion-icon></ion-icon></a>
            </div>
</section>
</main>
</body>
</html>