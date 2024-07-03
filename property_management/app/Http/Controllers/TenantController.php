<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Services\TenantService;
use App\Http\Requests\TenantRequest;

class TenantController extends Controller
{

    public function __construct(protected TenantService $TenantService) 
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $tenants = $this->TenantService->getTenants();
            return view('admin.tenant', compact('tenants'));
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
            $this->TenantService->store($request->validated());
            return redirect()->back()->with("success", "Tenant created successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Error: " . $e->getMessage());
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TenantRequest $request, Tenant $tenant)
    {
        try{
            $this->TenantService->update($request->validated(), $tenant);
            return redirect()->back()->with("success", "Tenant updated successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Error: " . $e->getMessage());
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
