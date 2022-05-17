<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Modules\Core\HTTPResponseCodes;
use App\Modules\Sanctum\SanctumService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SanctumController
{
    public function __construct(private SanctumService $service)
    {
    }

    public function issueToken(Request $request): Response
    {
        try {
            $dataArray = ($request->toArray() !== [])
                ? $request->toArray()
                : $request->json()->all();

            return new Response(
                $this->service->issueToken($dataArray),
                HTTPResponseCodes::Success['code']
            );
        } catch (Exception $e) {
            return new Response(
                [
                    'exception' => get_class($e),
                    'errors' => $e->getMessage(),
                ],
                HTTPResponseCodes::BadRequest['code']
            );
        }
    }
}
