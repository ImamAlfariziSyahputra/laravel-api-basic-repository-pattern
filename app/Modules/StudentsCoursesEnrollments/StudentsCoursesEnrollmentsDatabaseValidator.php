<?php

declare(strict_types=1);

namespace App\Modules\StudentsCoursesEnrollments;

use App\Modules\Courses\CoursesService;
use App\Modules\Students\StudentsService;
use InvalidArgumentException;

class StudentsCoursesEnrollmentsDatabaseValidator
{
    public function __construct(
        private CoursesService $coursesService,
        private StudentsService $studentsService
    ) {
    }

    public function validateUpdate(int $coursesId, int $studentsId): void
    {
        $course = $this->coursesService->get($coursesId);

        if ($course->getTotalsStudentsEnrolled() >= $course->getCapacity()) {
            throw new InvalidArgumentException("Failed to enrolled student. Course enrollment limit {$course->getTotalsStudentsEnrolled()} reached.");
        }

        //! no duplicates allowed.
        $studentsEnrolled = $this->studentsService->getByCourseId($coursesId);
        for ($i = 0; $i < count($studentsEnrolled); $i++) {
            if ($studentsEnrolled[$i]->getId() === $studentsId) {
                throw new InvalidArgumentException("Students already registered");
            }
        }
    }
}
