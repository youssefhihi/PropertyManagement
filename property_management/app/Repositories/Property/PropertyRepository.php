<?php
namespace App\Repositories\Property;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;


class PropertyRepository implements PropertyInterface {

    public function get(){
        return Property::where('status','available')->get();
    }   

    public function update($request,$property){
       return $property->update($request);
    }

    public function destroy($property){
      return  $property->delete();
    }

    public function store($request){
      $imageName = time() . "." . $request->image->extension();
      $request->image->storeAs('public/', $imageName);
        $data = $request->validated();
        $data['image'] = $imageName;
      return   Property::create($data);
    }
}
