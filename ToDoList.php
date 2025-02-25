<?php
    use ToDoItem;

    class TodoList {

        private int $id;
        private string $name;
        private array $items;

        public function __construct(int $id, string $name) {
            $this->id = $id;
            $this->name = $name;
            $this->items = [];
        }

        public function getId(): int {
            return $this->id;
        }

        public function getName(): string {
            return $this->name;
        }

        public function setName(string $name) {
            $this->name = $name;
        }

        public function getItems(): array {
            return $this->items;
        }

        public function addItem(ToDoItem $item) {
            $this->items[] = $item;
        }

        public function removeItem(int $id) {
            foreach ($this->items as $key => $item) {
                if ($item->getId() === $id) {
                    unset($this->items[$key]);
                    return;
                }
            }
        }
        
    }