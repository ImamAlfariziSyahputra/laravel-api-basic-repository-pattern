<?php

declare(strict_types=1);

namespace App\Modules\StudentsCoursesEnrollments;

use Illuminate\Support\Facades\Auth;

class StudentsCoursesEnrollmentsService
{
    public function __construct(
        private StudentsCoursesEnrollmentsValidator $validator,
        private StudentsCoursesEnrollmentsRepository $repository
    ) {
    }

    public function get(int $id): StudentsCoursesEnrollments
    {
        return $this->repository->get($id);
    }

    /** 
     * @return StudentsCoursesEnrollments[]
     */
    public function getByCourseId(int $studentsCoursesEnrollmentsId): array
    {
        return $this->repository->getByCourseId($studentsCoursesEnrollmentsId);
    }

    public function update(array $data): StudentsCoursesEnrollments
    {
        $data = array_merge(
            $data,
            [
                'enrolledByUsersId' => Auth::user()->id
            ]
        );

        $this->validator->validateUpdate($data);

        return $this->repository->update(
            StudentsCoursesEnrollmentsMapper::mapFrom($data)
        );
    }

    public function softDelete(int $id): bool
    {
        return $this->repository->softDelete($id);
    }
}
