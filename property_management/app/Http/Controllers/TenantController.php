<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Services\TenantService;
use App\Services\PropertyService;
use App\Http\Requests\TenantRequest;

class TenantController extends Controller
{
    protected $PropertyService;
    protected $TenantService;

    public function __construct(PropertyService $PropertyService,TenantService $TenantService)
    {
        $this->PropertyService = $PropertyService;
        $this->TenantService = $TenantService;
    }

   
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $tenants = $this->TenantService->getTenants();
            $properties = $this->PropertyService->getProperty();
            return view('admin.tenant', compact('tenants','properties'));
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Error: " . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TenantRequest $request)
    {
        try{
            $this->TenantService->store($request);
            return redirect()->back()->with("success", "Tenant created successfully");
        } catch (\Exception $e) {
            return dd("Error: " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        $properties = $this->PropertyService->getProperty();
        return view('admin.editTenant', compact('tenant','properties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TenantRequest $request, Tenant $tenant)
    {
        try{
            $this->TenantService->update($request->validated(), $tenant);
            return redirect("/dashboard/tenants")->with("success", "Tenant updated successfully");
        } catch (\Exception $e) {
            return dd("Error: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        try{
            $this->TenantService->delete($tenant);
            return redirect()->back()->with("success", "Tenant deleted successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Error: " . $e->getMessage());
        }
    }
}
