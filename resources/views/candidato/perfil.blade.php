@extends('layouts.app')
@section('link')
<link rel="stylesheet" type="text/css" href=" {{ asset('resources/css/app.css') }} ">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection
@section('content')
<div class="container">


    <div class="row">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-12">
                    <div class="card px-5 py-3 mt-5 shadow">
                        <h4 class="text-danger text-center mt-3 mb-4">Informação Pessoal</h4>
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
                                            @if($candidato->genero="F")
                                            <option value={{$candidato->genero}} >{{$candidato->genero}} </option>
                                            <option value="M">M</option>
                                        @else
                                        <option value={{$candidato->genero}} >{{$candidato->genero}} </option>
                                            <option value="F">F</option>
                                        @endif


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
                                        <label for="exampleFormControlFile1">Nível Académico</label>
                                         <select class="form-control"  name="nivel_acad" id="exampleFormControlSelect1">
                                            <option value={{$candidato->nivel_acade}} >{{$candidato->nivel_acade}} </option>
                                            <option value="Ensino Médio">Ensino Médio</option>
                                            <option value="Ensino Superior">Ensino Superior</option>
                                            <option value="Técnico Médio<">Tecnico Médio</option>

                                        </select>
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
                                <label for="exampleFormControlTextarea1">Sobre Mim</label>
                                <textarea class="form-control" value="" name="desc" id="exampleFormControlTextarea1" rows="3">
                                   {{$candidato->descricao}}
                                </textarea>
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
                                <label >{{URL::asset('/storage/'.$candidato->cv) }}</label>
                            </div>
                    </div>
                </div>


                    <br>

                    <div class="row">
                        <div class="col">
                            <div class="center" style=" display: flex;align-items: center;align-content: center" >

                                    <div class="mt-3">
                                        <button  type="submit" id="save_candidato" style="margin-bottom: .5rem; margin-left: .5rem" class="btn btn-primary">
                                            Actualizar Dados
                                         </button>
                                    </div>

                            </div>

                        </div>

                    </div>
                </form>
                    </div>
            </div>
            </div>
        </div>





        <div class="row">

            <div class="container-fluid" style="margin-bottom: 25px">
                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                        <div class="card px-5 py-3 mt-5 shadow">

                            <h4 class="text-danger text-center mt-3 mb-4">Experiencia de Trabalho</h4>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Descricão</th>
                                    <th scope="col">Cargo</th>
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
                                        <td>{{$experiencia->cargo}}</td>
                                        <td>{{$experiencia->empresa}}</td>
                                        <td>{{$experiencia->data_inicio}}</td>
                                        <td>{{$experiencia->data_fim}}</td>
                                        <td> <button id="btn_eliminar" onclick="" style="margin-right: 0.5rem" class="btn btn-danger">Eliminar</button><button class="btn btn-secondary" id="btn_actualizar" >Actualizar</button> </td>

                                    </tr>

                                    @endforeach

                                    @endisset

                                </tbody>
                              </table>
                              <div class="mt-3">
                                <button type="button" style="margin-bottom: .5rem; margin-left: .5rem" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalArea">
                                    <i class="now-ui-icons ui-1_simple-add"></i> Adicionar Experiencia
                                  </button>
                               </div>
                        </div>


                </div>
                </div>
            </div>

            </div>

            <div class="row">

                <div class="container-fluid" style="margin-bottom: 25px">
                    <div class="row justify-content-md-center">
                        <div class="col-md-12">
                            <div class="card px-5 py-3 mt-5 shadow">

                                <h4 class="text-danger text-center mt-3 mb-4">Formação/Aptidões</h4>
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">País</th>
                                        <th scope="col">Descricão</th>
                                        <th scope="col">Título</th>
                                        <th scope="col">Instituição</th>
                                        <th scope="col">Àrea</th>

                                        <th scope="col">Data Início</th>
                                        <th scope="col">Data Fim</th>
                                        <th scope="col">Opcões</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @isset($apt)

                                        @foreach ($apt as $apt)

                                        <tr>
                                            <th scope="row">{{$apt->id}} </th>

                                            <td>{{$apt->pais}}</td>
                                            <td>{{$apt->descricao}}</td>
                                            <td>{{$apt->titulo}}</td>
                                            <td>{{$apt->instituicao}}</td>
                                            <td>{{$apt->curso}}</td>

                                            <td>{{$apt->data_inicio}}</td>
                                            <td>{{$apt->data_fim}}</td>

                                            <td> <button id="btn_eliminar" onclick="" style="margin-right: 0.5rem" class="btn btn-danger">Eliminar</button><button class="btn btn-secondary" id="btn_actualizar" >Actualizar</button> </td>

                                        </tr>

                                        @endforeach

                                        @endisset



                                    </tbody>
                                  </table>
                                  <div class="mt-3">
                                    <button type="button" style="margin-bottom: .5rem; margin-left: .5rem" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalAreaAptdoes">
                                        <i class="now-ui-icons ui-1_simple-add"></i> Adicionar Aptidões
                                    </button>
                                   </div>

                            </div>


                    </div>
                    </div>
                </div>

                </div> {{--fim--}}
                <div class="row">

                    <div class="container-fluid" style="margin-bottom: 25px">
                        <div class="row justify-content-md-center">
                            <div class="col-md-12">
                                <div class="card px-5 py-3 mt-5 shadow">

                                    <h4 class="text-danger text-center mt-3 mb-4">Competências/Skils</h4>
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nome</th>

                                            <th scope="col">Opcões</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @isset($compt)
                                            @foreach($compt as $compt)

                                            <tr>
                                                <th scope="row">{{$compt->id}} </th>

                                                <td>{{$compt->nome_competencia}} </td>

                                                <td>
                                                    <button id="btn_eliminar" onclick="" style="margin-right: 0.5rem" class="btn btn-danger">Eliminar</button><button class="btn btn-secondary" id="btn_actualizar" >Actualizar</button>
                                                </td>

                                            </tr>
                                            @endforeach
                                            @endisset


                                        </tbody>
                                      </table>
                                      <div class="mt-3">
                                        <button type="button" style="margin-bottom: .5rem; margin-left: .5rem" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalArea1">
                                            <i class="now-ui-icons ui-1_simple-add"></i> Adicionar Competência
                                        </button>
                                       </div>

                                </div>


                        </div>
                        </div>
                    </div>

                    </div> {{--fim--}}


            </div>
 {{--fechou Row--}}

  <!-- Modal -->
  <div class="modal fade  bd-example-modal-lg" tabindex="-1" id="exampleModalArea" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div  class="modal-content">
<div class="list-group-item " style="padding: 15px;" >
    <form  action=" {{route('candidato.experiencia',$candidato->id)}} " method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Cargo</label>
            <input type="text" name="cargo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Inserir o cargo</div>
          </div>
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

  <!-- Modal de Formacões -->
  <div class="modal fade  bd-example-modal-lg" tabindex="-1" id="exampleModalAreaAptdoes" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div  class="modal-content">
<div class="list-group-item " style="padding: 15px;" >
    <form  action=" {{route('candidato.formacao',$candidato->id)}} " method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">

                <div class="col-md-6 form-group">
                    <label for="exampleFormControlSelect1">País</label>
                    <select class="form-control"  name="pais" id="exampleFormControlSelect1">
                        <option value="" >Selecione </option>
                        <option value="Angola">Angola</option>
                        <option value="Portugal">Portugal</option>

                    </select>
                  </div>



        <div class="row">

            <div class="col-md-4">
                <div class="col form-group">
                <label for="exampleFormControlSelect1">Data de Inicio</label>
              <input type="date" value="" name="dataInici" class="form-control">
            </div>
            </div>
            <div class="col-md-4">
                <div class="col form-group">
                <label for="exampleFormControlSelect1">Data do fim</label>
              <input type="date" value="" name="dataFim" class="form-control">
            </div>
            </div>
            <div class="col-md-2 form-check">
                <label class="form-check-label" for="exampleCheck1">A Decorrer</label>
                <input type="checkbox" class="form-check-input" name="estado" id="exampleCheck1">

            </div>
            <div class="col-md-2 form-check">
                <label class="form-check-label" for="exampleCheck1">Terminado</label>
                <input type="checkbox" class="form-check-input" name="estado" id="exampleCheck1">

            </div>

        </div>


        </div>
        <br>
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label for="exampleFormControlFile1">Título</label>
                    <input type="text" value=""  name="titulo" class="form-control" id="exampleFormControlFile1" placeholder="formaçºao de ...">

                </div>
            </div>
            <div class="col-md-6">
                <div class="col form-group">
                    <label for="exampleFormControlSelect1">Instituição</label>
                    <input type="text" value=""  name="insti" class="form-control" placeholder="nome da instituição">
                  </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col form-group">
                <label for="exampleFormControlSelect1">Área</label>
                <input type="text" value=""  name="area" class="form-control" placeholder="nome da instituição">
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

                <div class="mt-3">
                    <button  type="submit" id="save_candidato" style="margin-bottom: .5rem; margin-left: .5rem" class="btn btn-primary">
                        Actualizar Dados
                     </button>
                </div>

        </div>

    </div>

</div>
</form>
</div>
      </div>
    </div>
  </div>

  <!-- Modal de Aptidoes -->
  <div class="modal fade  bd-example-modal-lg" tabindex="-1" id="exampleModalArea1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div  class="modal-content">
<div class="list-group-item " style="padding: 15px;" >
    <form  action=" {{route('candidato.aptidao',$candidato->id)}}" method="post" enctype="multipart/form-data">
        @csrf


        <br>
        <div class="row">

            </div>
            <div class="col-md-6">
                <div class="col form-group">
                    <label for="exampleFormControlSelect1">Nome Competência</label>
                    <input type="text" value=""  name="nome" class="form-control" placeholder="Ex: Inglês">
                  </div>
            </div>
        </div>






<br>

<div class="row">
    <div class="col">
        <div class="center" style=" display: flex;align-items: center;align-content: center" >

                <div class="mt-3">
                    <button  type="submit" id="save_candidato" style="margin-bottom: .5rem; margin-left: .5rem" class="btn btn-primary">
                        Salvar
                     </button>
                </div>

        </div>

    </div>

</div>
</form>
</div>
      </div>
    </div>
  </div>





@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

<script>

    $("#btn_eliminar").on('click', function() {

    alert("olaaa")

    })



</script>
@endsection
