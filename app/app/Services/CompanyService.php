<?php

namespace App\Services;

use App\Repositories\CompanyRepository;
use Illuminate\Database\Eloquent\Collection;
use Mockery\Exception;

class CompanyService
{
    protected CompanyRepository $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function listCompanies($cep = null): ?Collection
    {
        $companies = $this->companyRepository->getAllCompanies($cep);

        if ($companies->isEmpty()) {
            throw new Exception('No companies found', 204);
        }
        return $companies;
    }
}
