<?php

declare(strict_types=1);

namespace App\Modules\StudentsCoursesEnrollments;

class StudentsCoursesEnrollments
{
    public function __construct(
        private ?int $id,
        private int $studentsId,
        private int $coursesId,
        private int $enrolledByUsersId,
        private ?string $deletedAt,
        private string $createdAt,
        private ?string $updatedAt,
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'studentsId' => $this->studentsId,
            'coursesId' => $this->coursesId,
            'enrolledByUsersId' => $this->enrolledByUsersId,
            'deletedAt' => $this->deletedAt,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    public function toSql(): array
    {
        return [
            'id' => $this->id,
            'students_id' => $this->studentsId,
            'courses_id' => $this->coursesId,
            'enrolled_by_users_id' => $this->enrolledByUsersId,
            'deleted_at' => $this->deletedAt,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getStudentsId(): int
    {
        return $this->studentsId;
    }
    public function getCoursesId(): int
    {
        return $this->coursesId;
    }
    public function getEnrolledByUsersId(): int
    {
        return $this->enrolledByUsersId;
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
