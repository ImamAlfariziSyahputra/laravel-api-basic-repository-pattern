<?php

declare(strict_types=1);

namespace App\Modules\Students;

class StudentsService
{
    public function __construct(
        private StudentsValidator $validator,
        private StudentsRepository $repository
    ) {
    }

    public function get(int $id): Students
    {
        return $this->repository->get($id);
    }

    /** 
     * @return Studets[]
     */
    public function getByCourseId(int $courseId): array
    {
        return $this->repository->getByCourseId($courseId);
    }

    public function update(array $data): Students
    {
        $this->validator->validateUpdate($data);

        return $this->repository->update(
            StudentsMapper::mapFrom($data)
        );
    }

    public function softDelete(int $id): bool
    {
        return $this->repository->softDelete($id);
    }
}
