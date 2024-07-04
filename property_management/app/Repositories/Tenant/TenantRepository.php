<?php
namespace App\Repositories\Tenant;

use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;


class TenantRepository implements TenantInterface {

    public function get(){
        return Tenant::get();
    }   

    public function update($request,$Tenant){
       return $Tenant->update($request);
    }

    public function destroy($Tenant){
      return  $Tenant->delete();
    }

    public function store($request){        
      return  Tenant::create($request->validated());      
    }
}
