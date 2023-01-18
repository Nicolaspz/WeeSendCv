<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\candidato_experiencia;
use App\Models\experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd("voce n é normal");
        if(Auth::user()->nivel=="normal"){

            return view('home');
        }
       else {
        return view('home');
       }
    }
    public function abrirCandidatura(){
        return view('candidato.candidatura');
    }
    public function abrirperfil($id){
        $data['candidato']= Candidato::find($id);
        $data['experiencia']= DB::table('experiencias')
        ->join('candidato_experiencias','candidato_experiencias.id_experiencia','=','experiencias.id')
        ->join('candidatos', 'candidatos.id',"=",'candidato_experiencias.id_candidato')
        ->select('experiencias.descricao','experiencias.empresa','experiencias.data_inicio','experiencias.data_fim','experiencias.id')
        ->where('candidatos.id','=', $id)
        ->get();



        //dd($data['experiencia']);
        return view('candidato.perfil', $data);
    }
}
