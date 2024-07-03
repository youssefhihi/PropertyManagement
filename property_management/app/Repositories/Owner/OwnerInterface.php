<?php
namespace App\Repositories\Owner;

interface OwnerInterface {

    public function get();
     
    public function update($request,$owner);

    public function destroy($owner);

    public function store($request);


 }

 ?>