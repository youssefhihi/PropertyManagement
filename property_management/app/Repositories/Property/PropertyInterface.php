<?php
namespace App\Repositories\Property;

interface PropertyInterface {

    public function get();
     
    public function update($request,$property);

    public function destroy($property);

    public function store($request);


 }

 ?>