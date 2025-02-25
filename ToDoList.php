<?php

    class TodoList {

        private array $items;

        public function __construct() {
            $this->items = [];
        }


        public function getItems(): array {
            return $this->items;
        }

        public function addItem(ToDoItem $item) {
            $this->items[] = $item;
        }

        public function findById(int $id): ?ToDoItem {
            foreach ($this->items as $item) {
                if ($item->getId() === $id) {
                    return $item;
                }
            }
            return null;
        }

        public function removeItem(int $id) {
            foreach ($this->items as $key => $item) {
                if ($item->getId() === $id) {
                    unset($this->items[$key]);
                    return;
                }
            }
        }

        public function toArray(): array {
            return array_map(fn($item) => $item->toArray(), $this->items);
        }

        
        
    }