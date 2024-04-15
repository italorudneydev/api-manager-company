<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    protected CompanyService $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function __invoke(Request $request): JsonResponse
    {
        try {
            $cep = $request->query('cep');
            $companies = $this->companyService->listCompanies($cep);

            return response()->json($companies);
        } catch (Exception $exception) {
            // Log the error message
            Log::error('Error in CompanyController' . $exception->getMessage());

            return new JsonResponse([
                'data' => __('apiMessages.error_request'),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);

        }
    }
}
