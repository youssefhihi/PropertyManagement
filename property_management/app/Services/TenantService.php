<?php
namespace App\Services;

use App\Repositories\Tenant\TenantInterface;

class TenantService
{
    public function __construct(
        protected TenantInterface $TenantRepository
    ) {
    }

    public function getTenants()
    {
        return $this->TenantRepository->get();
    }

    public function update($data, $Post)
    {
        return $this->TenantRepository->update($data, $Post);
    }

    public function delete($Post)
    {
        return $this->TenantRepository->destroy($Post);
    }

    public function store($data)
    {
        return $this->TenantRepository->store($data);
    }
  
}