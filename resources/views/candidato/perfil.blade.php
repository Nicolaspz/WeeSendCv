@extends('layouts.app')
@section('link')
<link rel="stylesheet" type="text/css" href=" {{ asset('resources/css/app.css') }} ">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@endsection
@section('content')
<div class="container">


    <div class="row">

        <div class="col-sm-12">
            <div class="card" >
                <div class="card-header" style="background: #d95716; color: white"><h4>Informação Pessoal</h4></div>
                <div class="card-body">
                    <form  action=" {{route('update',$candidato->id)}} " method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                          <div class="col-md-6">
                            <div class="col form-group">
                                <label for="exampleFormControlSelect1"> Nome Completo</label>
                            <input type="text" value={{$candidato->nome}}  name="p_nome" class="form-control" placeholder="ex.. Ad....">
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col form-group">
                                    <label for="exampleFormControlSelect1">Selecione o Género</label>
                                    <select class="form-control"  name="genero" id="exampleFormControlSelect1">
                                        <option value={{$candidato->genero}} >{{$candidato->genero}} </option>
                                        <option value="M">M</option>
                                        <option value="F">F</option>

                                    </select>
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col form-group">
                                <label for="exampleFormControlSelect1">Data de Nascimento</label>
                              <input type="date" value={{$candidato->data_nasc}} name="data" class="form-control">
                            </div>
                        </div>
                        </div>


                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Último Nível Académico</label>
                                    <input type="text" value={{$candidato->nivel_acade}}  name="nivel_acad" class="form-control" id="exampleFormControlFile1" placeholder="ex.. ensino  médio">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col form-group">
                                    <label for="exampleFormControlSelect1">Contacto</label>
                                    <input type="text" value={{$candidato->conntacto}}  name="contacto" class="form-control" placeholder="telefone">
                                  </div>
                            </div>
                        </div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="cima" style="position: absolute">

                                </div>
                                <label >Carregar CV</label>
                                <input type="file" value="{{URL::asset('/storage/'.$candidato->cv) }}" required name="cv"  class="form-control" id="exampleFormControlFile1">
                            </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descrição/Nota</label>
                            <textarea class="form-control" value="" name="desc" id="exampleFormControlTextarea1" rows="3">
                               {{$candidato->descricao}}
                            </textarea>
                          </div>
                    </div>

                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <div class="center" style=" display: flex;align-items: center;align-content: center" >

                                <button  type="submit" id="save_candidato" style="width: 50%; margin: 10px auto" class="btn btn-primary">
                                    Actualizar Dados do Perfil
                                 </button>

                        </div>

                    </div>

                </div>
            </form>
                </div>
            </div>



        </div>
    </div>


        <div class="row">

            <div class="col-md-12">

              <div class="card" style="margin-top: 1rem;">
            <div class="card-header" style="background: #d95716; color: white; margin-bottom: 1.5rem">
                <h4>Experiências de Trabalho</h4></div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Descricão</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Data Inicio</th>
                            <th scope="col">Data Fim</th>
                            <th scope="col">Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                            @isset($experiencia)

                            @foreach ($experiencia as $experiencia)

                            <tr>
                                <th scope="row">{{$experiencia->id}} </th>
                                <td>{{$experiencia->descricao}}</td>
                                <td>{{$experiencia->empresa}}</td>
                                <td>{{$experiencia->data_inicio}}</td>
                                <td>{{$experiencia->data_fim}}</td>
                                <td> <button id="btn_eliminar" style="margin-right: 0.5rem" class="btn btn-danger">Eliminar</button><button class="btn btn-secondary" id="btn_actualizar" >Actualizar</button> </td>

                            </tr>

                            @endforeach

                            @endisset

                        </tbody>
                      </table>



            </div>

    <div class="col-md">
        <button type="button" style="margin-bottom: .5rem; margin-left: .5rem" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalArea">
            <i class="now-ui-icons ui-1_simple-add"></i> Adicionar Experiencia
          </button>
       </div>
    </div>
                </div>
            </div>





            </div>
 </div>{{--fechou Row--}}

  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" id="exampleModalArea" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
<div class="list-group-item " style="padding: 15px;" >
    <form  action=" {{route('candidato.experiencia',$candidato->id)}} " method="post">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Descrição</label>
          <input type="text" name="descri" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Inserir o nome, título da esperiência</div>
        </div>
        <div class="row">
            <div class=" col mb-3">
                <label for="exampleInputPassword1" class="form-label">Início</label>
                <input type="date" name="data_ini" class="form-control" id="exampleInputPassword1">
              </div>
              <div class= " col mb-3">
                  <label for="exampleInputPassword1" class="form-label">Fim</label>
                  <input type="date" name="data_fim" class="form-control" id="exampleInputPassword1">
                </div>
        </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nome da Empresa</label>
            <input type="text" name="empresa" class="form-control" id="exampleInputPassword1">
          </div>

       <div class="row">
        <button style="width: 50%; margin: 0 auto" type="submit" class="btn btn-primary">salvar</button>
       </div>
      </form>
</div>
      </div>
    </div>
  </div>





@endsection
@section('script')
<script>

$("#btn_eliminar").on('click', function() {

alert("olaaa")

})

</script>
@endsection
