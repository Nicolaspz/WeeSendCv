<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCandidato;
use App\Models\Candidato;
use App\Models\candidato_experiencia;
use App\Models\experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Psy\Readline\Hoa\Console;

class CandidatoController extends Controller
{


    public function update(Request $request, $id){
        $candidato= Candidato::find($id);

        $candidato->nome=$request->input('p_nome');
        $candidato->genero=$request->input('genero');
        $candidato->data_nasc=$request->input('data');
        $candidato->nivel_acade=$request->input('nivel_acad');
        $candidato->conntacto=$request->input('contacto');
        $candidato->descricao=$request->input('desc');


        //dd($request->file('vc'));

        if($request->file('cv')->isValid()){

            if(Storage::exists($candidato->cv)){
                // dd("chegou aki ");
                 Storage::delete($candidato->cv);

                     }
            $fileName=$request->input('p_nome') .'Cv' . '.' . $request->file('cv')->extension();

           $file= $request->cv->storeAs('cvs',$fileName);
           $candidato->cv=$file;

           }

        $candidato->update();
        return redirect()->route('candidato.perfil',$id)->with('sucess','dados actualizado');

    }
    public function expeperienciaAdd($id,Request $request){
        $exp['empresa']=$request->empresa;
        $exp['data_inicio']=$request->data_ini;
        $exp['data_fim']=$request->data_fim;
        $exp['descricao']=$request->descri;
        //dd($request->all());
        $cont=0;

        if($Cand=experiencia::create($exp)){
            $exp_cand['id_candidato']=$id;
            $exp_cand['id_experiencia']=$Cand->id;
            $exp_cand['qtd']=$cont++;
            $Exp=candidato_experiencia::create($exp_cand);

        }
        return redirect()
      ->route('candidato.perfil',$id)
      ->with('message', 'post criado');
    }
}
