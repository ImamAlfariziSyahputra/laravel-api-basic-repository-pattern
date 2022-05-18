<?php

declare(strict_types=1);

namespace App\Modules\StudentsCoursesEnrollments;

use InvalidArgumentException;

class StudentsCoursesEnrollmentsValidator
{
    public function __construct(private StudentsCoursesEnrollmentsDatabaseValidator $dbValidator)
    {
    }

    public function validateUpdate(array $data): void
    {
        $validator = validator($data, [
            'studentsId' => 'required|int|exists:students,id',
            'coursesId' => 'required|int|exists:students,id',
            'enrolledByUsersId' => 'required|int|exists:users,id',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException(
                json_encode($validator->errors()->all())
            );
        }

        $this->dbValidator->validateUpdate($data['coursesId'], $data['studentsId']);
    }
}
