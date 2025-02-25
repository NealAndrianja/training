<?php
enum Priority: string {
    case LOW    = "low";
    case MEDIUM = "medium";
    case HIGH   = "high";
}

class ToDoItem
{
    private static int $counter = 0;
    private int $id;
    private string $title;
    private string $description;
    private Priority $priority;
    private DateTime $dueDate;

    private bool $completed;

    public function __construct(string $title, string $description, string $priority, string $dueDate, $completed = false)
    {
        $this->id          = ++self::$counter;
        $this->title       = $title;
        $this->description = $description;
        $this->priority    = Priority::tryFrom($priority);
        $this->dueDate     = new DateTime($dueDate);
        $this->completed   = $completed;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getPriority(): string
    {
        return $this->priority->value;
    }

    public function setPriority(string $priority)
    {
        $this->priority = new Priority($priority);
    }

    public function getDueDate(): DateTime
    {
        return $this->dueDate;
    }

    public function setDueDate(string $dueDate)
    {
        $this->dueDate = new DateTime($dueDate);
    }

    public function isCompleted(): bool
    {
        return $this->completed;
    }

    public function toggleComplete()
    {
        $this->completed = ! $this->completed;
    }

    public function toArray(): array
    {
        return [
            "id"          => $this->id,
            "title"       => $this->title,
            "description" => $this->description,
            "dueDate"     => $this->dueDate->format("Y-m-d"),
            "priority"    => $this->priority->value,
            "completed"   => $this->completed,
        ];
    }

    public static function fromArray($data): ToDoItem
    {
        $priority = Priority::tryFrom($data['priority']) ?? Priority::MEDIUM; // Convert to enum, default to MEDIUM if invalid

        return new self($data['title'], $data['description'], $data["priority"], $data['dueDate'], $data['completed']);
    }
}
