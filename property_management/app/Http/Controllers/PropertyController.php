<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Services\OwnerService;
use App\Services\PropertyService;
use App\Http\Requests\PropertyRequest;

class PropertyController extends Controller
{
    protected $PropertyService;
    protected $OwnerService;

    public function __construct(PropertyService $PropertyService,OwnerService $OwnerService)
    {
        $this->PropertyService = $PropertyService;
        $this->OwnerService = $OwnerService;
    }

   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{

            $properties = $this->PropertyService->getProperty();
            $owners = $this->OwnerService->getOwners();
            return view('admin.property', compact('properties', 'owners'));

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
    public function store(PropertyRequest $request)
    {

        
        try {
            $this->PropertyService->store($request);
            return redirect()->back()->with("success", "Property created successfully");
    
        } catch (\Exception $e) {
            return dd('Error: ' . $e->getMessage());
        }
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, Property $property)
    {
        try{
            $this->PropertyService->update($request->validated(), $property);
            return redirect()->back()->with("success", "Property updated successfully");
        } catch (\Exception $e) {

            return redirect()->back()->with("error", "Error: " . $e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        try{

            $this->PropertyService->delete($property);
            return redirect()->back()->with("success", "Property deleted successfully");
        }catch (\Exception $e) {

            return redirect()->back()->with("error", "Error: " . $e->getMessage());
        }
    }
}
