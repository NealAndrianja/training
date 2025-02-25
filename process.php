<?php

require_once 'FileHandler.php';
require_once 'ToDoItem.php';
require_once 'ToDoList.php';

$fileHandler = new FileHandler();
$todoList    = $fileHandler->load();

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST['action'])){
        switch ($_POST['action']) {
            case 'add':
                $item = new ToDoItem($_POST['title'], $_POST['description'], $_POST['priority'], $_POST['dueDate']);
                $todoList->addItem($item);
                break;
            
            default:
                break;
        }
        $fileHandler->save($todoList);
    }
}

header('Location: index.php');
exit;