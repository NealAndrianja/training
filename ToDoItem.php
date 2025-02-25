<?php
    class ToDoItem {
        private int $id;
        private string $task;
        private bool $completed;

        public function __construct($id, $task, $completed=false)
        {
            $this->id = $id;
            $this->task = $task;
            $this->completed = $completed;
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function getTask(): string
        {
            return $this->task;
        }

        public function setTask(string $task)
        {
            $this->task = $task;
        }

        public function isCompleted(): bool
        {
            return $this->completed;
        }

        public function toggleComplete()
        {
            $this->completed = !$this->completed;
        }

        public function toArray(): array
        {
            return [
                'id' => $this->id,
                'task' => $this->task,
                'completed' => $this->completed
            ];
        }

        public static function fromArray($data): ToDoItem
        {
            return new self($data['id'], $data['task'], $data['completed']);
        }
    }