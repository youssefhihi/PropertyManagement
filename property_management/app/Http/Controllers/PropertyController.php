<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Services\PropertyService;
use App\Http\Requests\PropertyRequest;


class PropertyController extends Controller
{

    public function __construct(protected PropertyService $PropertyService) 
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{

            $properties = $this->PropertyService->getProperty();
            return $properties;

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
        $this->PropertyService->store($request);
        return true;
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
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }
}
