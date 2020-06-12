<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;




class CondidatLoginController extends Controller
{
    public function __construct()
      {
         $this->middleware('guest:admin');
      }
    //
    public function login (Request $request)
{
       if($request){
            if ($request->email) {
            
        $res= DB::select("select * from condidats where email =? ",[$request->email]);
               if(password_verify($request->password,$res[0]->password))
               {
                   return $res;
               }
               else {return 0;}
            }
        }
        
        
        
    }
}
