<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCandidato;
use App\Models\Candidato;
use App\Models\candidato_experiencia;
use App\Models\competencias;
use App\Models\competencias_candidato;
use App\Models\experiencia;
use App\Models\formaca_aca_candidato;
use App\Models\formacao_academica;
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




        if($request->file('cv')->isValid()){

            if(Storage::exists($candidato->cv)){

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

        $exp['cargo']=$request->cargo;
        $exp['empresa']=$request->empresa;
        $exp['data_inicio']=$request->data_ini;
        $exp['data_fim']=$request->data_fim;
        $exp['descricao']=$request->descri;

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

    public function Formacaodd($id, Request $request){

        $aptd['pais']=$request->pais;
        $aptd['descricao']=$request->desc;
        $aptd['titulo']=$request->titulo;
        $aptd['instituicao']=$request->insti;
        $aptd['curso']=$request->area;
        $aptd['estado']=$request->estado;
        $aptd['data_inicio']=$request->dataInici;
        $aptd['data_fim']=$request->dataFim;

        if($Aptdd=formacao_academica::create($aptd)){
            $apt_cand['id_candidato']=$id;
            $apt_cand['id_formacao_acad']=$Aptdd->id;
            $apt_cand['qtd']=0;
            $Aptt_Cand=formaca_aca_candidato::create($apt_cand);
        }
        return redirect()
      ->route('candidato.perfil',$id)
      ->with('message', 'Aptidões adicionada com sucesso !!');

    }

    public function AptidaoAdd($id, Request $request){

        $form['nome_competencia']=$request->nome;
            if($F=competencias::create($form)){
                $form_cand['id_candidato']=$id;
                $form_cand['id_competencia']=$F->id;
                $form_cand['qtd']=0;
                $FORMACAO=competencias_candidato::create($form_cand);

            }
            return redirect()
            ->route('candidato.perfil',$id)
            ->with('message', 'formação adicionada com sucesso !!');


    }

    public function GetComp(Request $request){

         $tags=[];
        if($search=$request->nome){

            $tags=competencias::where('nome_competencia', 'LIKE',"%$search%")->get();

        }
        return response()->json($tags);
    }



}
