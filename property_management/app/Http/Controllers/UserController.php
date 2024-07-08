<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Services\OwnerService;
use App\Services\TenantService;
use App\Services\PropertyService;

class UserController extends Controller
{
    protected $PropertyService;
    protected $TenantService;
    protected $OwnerService;


    public function __construct(PropertyService $PropertyService, TenantService $TenantService , OwnerService $OwnerService)
    {
        $this->PropertyService = $PropertyService;
        $this->TenantService = $TenantService;
        $this->OwnerService = $OwnerService;
       
    }

    public function index()
    {
      $properties = $this->PropertyService->getProperty();
      $locals = $this->PropertyService->getLocals();
        return view('welcome', compact('properties', 'locals'));
    }
    public function statistic()
    {
        $propertiesCount = $this->PropertyService->getCount();
        $ownersCount = $this->OwnerService->getOwnersCount();
        $tenantsCount = $this->TenantService->getTenantsCount();
        return view('admin.dashboard', compact('propertiesCount', 'ownersCount','tenantsCount'));
    }
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->get('query');
            $output =[];
            if($query != ''){
                $data = Tenant::where('name','like', '%'.$query.'%')->with('property')->get();
    
                $total_data = $data->count();
                if($total_data > 0){
                    $output = $data->toArray();
                }
            }
            $data = [
                'search_data' => $output,               
            ];
            echo json_encode($data);
            
        }
        
            
        
    }

    public function filter(Request $request)
    {
        $local = $request->input('local');
        $locals = $this->PropertyService->getLocals();
        $properties = Property::where('local', $local)->get();
        return view('welcome', compact('properties', 'locals'));


    }
}
