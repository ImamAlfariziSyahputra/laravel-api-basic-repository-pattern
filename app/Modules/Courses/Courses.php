<?php

declare(strict_types=1);

namespace App\Modules\Courses;

class Courses
{
    public function __construct(
        private ?int $id,
        private string $name,
        private int $capacity,
        private int $totalsStudentsEnrolled,
        private ?string $deletedAt,
        private string $createdAt,
        private ?string $updatedAt,
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'capacity' => $this->capacity,
            'totalsStudentsEnrolled' => $this->totalsStudentsEnrolled,
            'deletedAt' => $this->deletedAt,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    public function toSql(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'capacity' => $this->capacity,
            'deleted_at' => $this->deletedAt,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getCapacity(): int
    {
        return $this->capacity;
    }
    public function getTotalsStudentsEnrolled(): int
    {
        return $this->totalsStudentsEnrolled;
    }
    public function getDeletedAt(): ?string
    {
        return $this->deletedAt;
    }
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }
}
