<?php
namespace App\Services;

use App\Repositories\Property\PropertyInterface;

class PropertyService
{
    public function __construct(
        protected PropertyInterface $PropertyRepository
    ) {
    }
    
    public function getLocals()
    {
        return $this->PropertyRepository->getLocals();
    }
    public function getProperty()
    {
        return $this->PropertyRepository->get();
    }

    public function update($data, $Post)
    {
        return $this->PropertyRepository->update($data, $Post);
    }

    public function delete($Post)
    {
        return $this->PropertyRepository->destroy($Post);
    }

    public function store($data)
    {
        return $this->PropertyRepository->store($data);
    }
  
}