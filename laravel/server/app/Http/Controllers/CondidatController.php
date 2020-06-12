<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Condidat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CondidatController extends Controller
{

    public function __construct()
    {
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      //  $listcondidat = Auth::user()->condidats;
         //dapres le user je peut acceder a la liste de condidats liee a ce user
        // $listcondidat = Condidat::all(); for admin
        // $listcondidat = Condidat::where('user_id',Auth::user()->id)->get(); //list of condidats created by this user authen
           return Condidat::select('cne', 'cin','nom','filiere_du_bac','date_du_bac','tele','accept')
           ->where('accept','=', 0)
           ->get();
       // $listcondidat = Condidat::all();
       // return view('condidat.index',['condidats' => $listcondidat]);
    }
    public function index1()
    {

         return Condidat::select('cne', 'cin','nom','filiere_du_bac','date_du_bac','tele','accept')
           ->where('accept','=', 1)
           ->get();
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('condidat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nom' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:admins',
            'password' => 'required|string|min:6'
        ]);

        return Condidat::create([
            'cne'=>$request['cne'],
            'cin'=>$request['cin'],
            'nom' => $request['nom'],
            'prenom'=>$request['prenom'],
            'sexe'=>$request['sexe'],
            'tele'=>$request['tele'],
            'date_du_bac'=>$request['date_du_bac'],
            'filiere_du_bac'=>$request['filiere_du_bac'],
            'date_de_naissance'=>$request['date_de_naissance'],
            'lieu_de_naissance'=>$request['lieu_de_naissance'],
            'pays' => $request['pays'],
            'region' => $request['region'],
            'province'=>$request['province'],
            'adress' => $request['adress'],
            'filier_id_1'=>$request['filier_id_1'],
            'filier_id_2'=>$request['filier_id_2'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'accepet'=>$request['accept'],
           
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $condidat = Condidat::find($id);

        return view('condidat.edit',['condidat'=>$condidat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCondidat $request, $id)
    {
        $condidat = Condidat::findOrFail($id);
                    $condidat->image=$request->input('image');
                    $condidat->cin=$request->input('cin');
                    $condidat->cne=$request->input('cne');
                    $condidat->tele=$request->input('tele');
                    $condidat->nom=$request->input('nom');
                    $condidat->prenom=$request->input('prenom');
                    $condidat->sexe=$request->input('sexe');
                    $condidat->date_du_bac=$request->input('date_du_bac');
                    $condidat->filiere_du_bac=$request->input('filiere_du_bac');
                    $condidat->date_de_naissance=$request->input('date_de_naissance');
                    $condidat->lieu_de_naissance=$request->input('lieu_de_naissance');
                    $condidat->pays=$request->input('pays');
                    $condidat->region=$request->input('region');
                    $condidat->province=$request->input('province');
                    $condidat->adress=$request->input('adress');
        $condidat->save();

         return redirect()->route('condidats.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $condidat = Condidat::findOrFail($id);

        $condidat->delete();
        return redirect('condidats');

    }
    public function refrech(Request $request)
    {
        
        if($request){
            if ($request->email) {
            
            $res=DB::table('condidats')->where('email', [$request->email])->value('id');
            
            $condidat=Condidat::findOrFail($res);
            return $condidat;
               
               
            }
        } } 
        public function inscrit(Request $request, $id) {
            
            return Condidat::where('id', $id)->update($request->all());
            
        }  
    
     
    }
