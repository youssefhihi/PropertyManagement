<?php
namespace App\Repositories\Owner;
use App\Models\Owner;
use Illuminate\Support\Facades\Auth;


class OwnerRepository implements OwnerInterface {

    public function get(){
        return Owner::get();
    }   

    public function update($request,$owner){
       return $owner->update($request);
    }

    public function destroy($owner){
      return  $owner->delete();
    }

    public function store($request){
      return  Owner::create($request->validated());      
    }
}
