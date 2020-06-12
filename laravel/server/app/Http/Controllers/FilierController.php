<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filier;

class FilierController extends Controller
{
    public function index()
    {
        return  Filier::all();
    }

    
    public function show($id)
    {
        return Filier::find($id);
    }

    public function store(Request  $request)
    {
        $admin= Filier::create($request->all());
    }


    public function update(Request $request,$id)
    {
        $admin=Filier::findOrFail($id);
        $admin->update($request->all());
    }

    
    public function delete(Request $request,$id)
    {
        $admin =Filier::findOrFail($id);
        $admin->delete();
        return 204;
    }
}
