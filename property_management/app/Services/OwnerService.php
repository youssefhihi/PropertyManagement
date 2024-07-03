<?php
namespace App\Services;

use App\Repositories\Owner\OwnerInterface;

class OwnerService
{
    public function __construct(
        protected OwnerInterface $OwnerRepository
    ) {
    }

    public function getOwners()
    {
        return $this->OwnerRepository->get();
    }

    public function update($data, $owner)
    {
        return $this->OwnerRepository->update($data, $owner);
    }

    public function delete($owner)
    {
        return $this->OwnerRepository->destroy($owner);
    }

    public function store($request)
    {
        return $this->OwnerRepository->store($request);
    }
  
}