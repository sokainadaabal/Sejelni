<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Admin;
use App\Exports\AdminsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

use DB;


class AdminController extends Controller
{ 
    
    public function __construct()
{
     //$this->middleware('guest:admin');
}

    
    public function index()
    {
        return Admin::all();
    }
    
   
    
    public function show($id)
    {
        return Admin::find($id);
    }

    public function store(Request  $request)
    {
       
        $this->validate($request,[
            'nom' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:admins',
            'password' => 'required|string|min:6'
        ]);

        return Admin::create([
            'civilite'=>$request['civilite'],
            'nom' => $request['nom'],
            'prenom'=>$request['prenom'],
            'filier_id'=>$request['filier_id'],
            'tel'=>$request['tel'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'pay' => $request['pay'],
            'ville' => $request['ville'],
            'adress' => $request['adress'],
            'active'=>$request['active'],
           
        ]);
    }


    public function update(Request $request,$id)
    {
        $admin=Admin::findOrFail($id);
       
        $this->validate($request,[
            'nom' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$admin->id,
            'password' => 'sometimes|min:6'
        ]);
       
       $admin->update(
        [
            'civilite'=>$request['civilite'],
            'nom' => $request['nom'],
            'prenom'=>$request['prenom'],
            'filier_id'=>$request['filier_id'],
            'tel'=>$request['tel'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'pay' => $request['pay'],
            'ville' => $request['ville'],
            'adress' => $request['adress'],
            'active'=>$request['active'],
           
        ]
       );
        return 105;
    }

    
    public function delete(Request $request,$id)
    {
        $admin =Admin::findOrFail($id);
        $admin->delete();
        return 204;
    }
    public function refrech(Request $request)
    {
        
        if($request){
            if ($request->email) {
            
            $res=DB::table('admins')->where('email', [$request->email])->value('id');
            
                 $admin=Admin::findOrFail($res);
                 return $admin;
               
               
            }
        } }   
    
     }
