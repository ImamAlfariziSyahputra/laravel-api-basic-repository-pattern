<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Modules\Core\HTTPResponseCodes;
use App\Modules\Students\StudentsService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentsController
{
    public function __construct(private StudentsService $service)
    {
    }

    public function get(int $id): Response
    {
        try {
            return new Response($this->service->get($id)->toArray());
        } catch (Exception $e) {
            return new Response(
                [
                    'exception' => get_class($e),
                    'error' => $e->getMessage(),
                ],
                HTTPResponseCodes::BadRequest['code']
            );
        }
    }

    public function update(Request $request): Response
    {
        try {
            $dataArray = ($request->toArray() !== [])
                ? $request->toArray()
                : $request->json()->all();

            return new Response(
                $this->service->update($dataArray)->toArray(),
                HTTPResponseCodes::Success['code']
            );
        } catch (Exception $e) {
            return new Response(
                [
                    'exception' => get_class($e),
                    'error' => $e->getMessage(),
                ],
                HTTPResponseCodes::BadRequest['code']
            );
        }
    }

    public function softDelete(int $id): Response
    {
        try {
            return new Response($this->service->softDelete($id));
        } catch (Exception $e) {
            return new Response(
                [
                    'exception' => get_class($e),
                    'error' => $e->getMessage(),
                ],
                HTTPResponseCodes::BadRequest['code']
            );
        }
    }
}
