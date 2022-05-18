<?php

declare(strict_types=1);

namespace App\Modules\Courses;

class CoursesService
{
    public function __construct(
        private CoursesValidator $validator,
        private CoursesRepository $repository
    ) {
    }

    public function get(int $id): Courses
    {
        return $this->repository->get($id);
    }

    /** 
     * @return Courses[]
     */
    public function getByCourseId(int $courseId): array
    {
        return $this->repository->getByCourseId($courseId);
    }

    public function update(array $data): Courses
    {
        $this->validator->validateUpdate($data);

        return $this->repository->update(
            CoursesMapper::mapFrom($data)
        );
    }

    public function softDelete(int $id): bool
    {
        return $this->repository->softDelete($id);
    }
}
