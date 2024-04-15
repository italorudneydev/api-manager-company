<?php

namespace App\Repositories;

use App\Company;
use Illuminate\Database\Eloquent\Collection;

class CompanyRepository
{

    /**
     * Get all companies, optionally filtered by CEP.
     *
     * @param  string|null $cep
     * @return Collection
     */
    public function getAllCompanies(string $cep = null): Collection
    {
        $query = Company::query();

        if ($cep) {
            $query->where('cep', $cep);
        }

        return $query->get();
    }
}
