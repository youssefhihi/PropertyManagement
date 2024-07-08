<?php
namespace App\Repositories\Tenant;

interface TenantInterface {

    public function get();
     
    public function update($request,$Tenant);

    public function destroy($Tenant);

    public function store($request);

    public function getTenantsCount();


 }

 ?>