<?php

declare(strict_types=1);

namespace App\Modules\Students;

class StudentsService
{
    public function get(int $id): Students
    {
    }

    /** 
     * @return Studets[]
     */
    public function getByCourseId(int $courseId): array
    {
    }

    public function update(array $data): Students
    {
    }

    public function softDelete(intr $id): bool
    {
    }
}
