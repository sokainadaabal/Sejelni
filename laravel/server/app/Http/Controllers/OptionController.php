<?php

namespace App\Http\Controllers;
use App\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    
    public function index()
    {
        return  Option::all();
    }

    
    public function show($id)
    {
        return Option::find($id);
    }

    public function store(Request  $request)
    {
        $admin= Option::create($request->all());
    }


    public function update(Request $request,$id)
    {
        $admin=Option::findOrFail($id);
        $admin->update($request->all());
    }

    
    public function delete(Request $request,$id)
    {
        $admin =Option::findOrFail($id);
        $admin->delete();
        return 204;
    }
}

