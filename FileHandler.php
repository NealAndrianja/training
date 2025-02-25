<?php

class FileHandler
{
    private string $filePath;

    public function __construct(string $filePath = 'data/todo.json')
    {
        $this->filePath = $filePath;
    }

    public function save(TodoList $todoList)
    {
        file_put_contents($this->filePath, json_encode($todoList->toArray()), JSON_PRETTY_PRINT);
    }

    public function load(): TodoList
    {
        $todoList = new TodoList();
        if (! file_exists($this->filePath)) {
            return $todoList;
        }

        $data = json_decode(file_get_contents($this->filePath), true);
        
        foreach ($data as $item) {
            $todoList->addItem(ToDoItem::fromArray($item));
        }
        return $todoList;

    }

}
