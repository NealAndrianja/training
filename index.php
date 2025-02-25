<?php

    require_once 'FileHandler.php';
    require_once 'ToDoItem.php';
    require_once 'ToDoList.php';

    $fileHandler = new FileHandler();
    $todoList    = $fileHandler->load();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ToDo List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h2>📌 To-Do List</h2>
    <form action="process.php" method="POST">
        <input type="hidden" name="action" value="add">
        <input type="text" name="title" placeholder="Task Title" required>
        <textarea name="description" placeholder="Description"></textarea>
        <input type="date" name="dueDate" required>
        <select name="priority">
            <option value="low">Low</option>
            <option value="medium" selected>Medium</option>
            <option value="high">High</option>
        </select>
        <button type="submit">Add Task</button>
    </form>

    <ul>
        <?php foreach ($todoList->getItems() as $task): ?>
            <li>
                <?= $task->toArray()["title"] ?> (<?= $task->toArray()["dueDate"] ?>) - 
                <?= $task->toArray()["priority"] ?> 
                
                <?php if (!$task->isCompleted()): ?>
                    <form action="process.php" method="POST" style="display:inline;">
                        <input type="hidden" name="action" value="complete">
                        <input type="hidden" name="id" value="<?= $task->getId() ?>">
                        <button type="submit">✔ Complete</button>
                    </form>
                <?php endif; ?>

                <form action="process.php" method="POST" style="display:inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $task->getId() ?>">
                    <button type="submit">🗑 Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
