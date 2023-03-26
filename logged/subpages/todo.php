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
            <li style="float: right"> <a href="../index.php">Back to main</a> </li>
        </ul>
    </nav>
</header>
<main>
<section id="todo_shortcut" class="shortcut">
            <h1>To Do</h1>
<!--            <form action="../subpages/todo.php" method="post" >-->
<!--                <label for="sort">-->
<!--                    <select name="sort" id="sort">Sort By:-->
<!--                        <option value="1">By date</option>-->
<!--                        <option value="2">By status</option>-->
<!--                    </select>-->
<!--                        --><?php //
//                        $_SESSION['sort'] = $_POST['sort']
//                        ?>
<!--                        <button class="sort" type="submit"></button>-->
<!--                </label>-->
<!--            </form>-->
            <div class ="todo">
                <form action="../functions/edit-task.php" method="post">
                <?php include '../functions/todo.php'; ?>
                <button type="submit"  class="button" id="open-tasks"> <ion-icon name="copy-outline"></ion-icon></ion-icon> Save</button>
                </form>
            </div>
</section>
    <section class="shortcut" id="actions">
        <form action="../functions/add-task.php" method="post">
            <h1>New Task</h1>
            <label for="task">Task
                <textarea id="task" name="task"></textarea>
            </label>
            <label for="date"> End Date
            <input type="date" id="date" name="date">
            </label>
            <button type="submit" class="button"><ion-icon name="add-circle-outline"></ion-icon>Add new</button>
        </form>
        <form action="../functions/remove-task.php" method="post">
            <h1>Delete Task</h1>
            <label for="delete">Choose id task to delete:<br></label>
            <input type="number" name="delete" id="delete"><br>
            <button type="submit" class="button" id="delete-task" ><ion-icon name="save-outline"></ion-icon>&nbsp; Delete task</button>
        </form>
    </section>
</main>
</body>
</html>