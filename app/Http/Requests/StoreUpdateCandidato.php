<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCandidato extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request....
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           'nome'=>'required|min:3|max:25',
           'genero'=>'required',
           'descricao'=>'required',
           'data_nasc'=>'required',
           'conntacto'=>'required|min:9|max:13',
           'nivel_acade'=>'required',
           'cv'=>'required',
           'obs'=>'required'
        ];
    }
}
