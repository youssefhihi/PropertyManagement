<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Services\PropertyService;

class UserController extends Controller
{
    protected $PropertyService;

    public function __construct(PropertyService $PropertyService)
    {
        $this->PropertyService = $PropertyService;
       
    }

    public function index()
    {
      $properties = $this->PropertyService->getProperty();
      $locals = $this->PropertyService->getLocals();
        return view('welcome', compact('properties', 'locals'));
    }
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->get('query');
            $output =[];
            if($query != ''){
                $data = Tenant::where('name','like', '%'.$query.'%')->get();
    
                $total_data = $data->count();
                if($total_data > 0){
                    $output = $data;
                }else{
                    $output = $query;
                }
            } else {
                $output = 'No query provided';
            }
            $data = [
                'table_data' => $output,
                'total_data' => $total_data,
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
