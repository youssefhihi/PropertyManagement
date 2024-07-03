<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use App\Services\OwnerService;
use App\Http\Requests\OwnerRequest;
use Illuminate\Support\Facades\Redirect;

class OwnerController extends Controller
{

    public function __construct(protected OwnerService $OwnerService) 
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{

            $properties = $this->OwnerService->getOwners();
            return view('admin.owner', compact('properties'));

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
    public function store(OwnerRequest $request)
    {
        try{
            $this->OwnerService->store($request->validated());
            return redirect()->back()->with("success", "Owner created successfully");
        } catch (\Exception $e) {

            return redirect()->back()->with("error", "Error: " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OwnerRequest $request, Owner $owner)
    {
        try{

            $this->OwnerService->update($request->validated(), $owner);
            return Redirect::back()->with("success", "Owner updated successfully");

        } catch (\Exception $e) {

            return redirect()->back()->with("error", "Error: " . $e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        try{
            $this->OwnerService->delete($owner);
            return Redirect::back()->with("success", "Owner deleted successfully");

        } catch (\Exception $e) {

            return redirect()->back()->with("error", "Error: " . $e->getMessage());

        }
    }
}
