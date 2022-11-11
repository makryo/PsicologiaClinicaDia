<?php
use App\Models\User;
use App\Models\paciente;

$usu = User::all();
$paci = paciente::all();
?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Formulario</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Actualizar datos de la entrevista</h1>
                    <div class="container">
                    @if(session()->has('success'))

                    <!--//modal code goes here-->
                    
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Hecho!</strong> {{ session()->get('success') }}
                    </div>
                    <!--<div class="text-success">{{ session()->get('success') }}</div>-->

                    @endif
                        
                    <!-- -->
                        <form method="post" action="{{route('entrevistas.update', $Edita->id)}}">
                        @method('PATCH')    
                        {{ csrf_field() }}

                            <div class="row">
                                <div class="col-6">
                                    <br>
                                    <label>Paciente</label>
                                        <div class="input-group mb-3">
                                            <select name="paciente_id" class=" form-control">
                                                @foreach($paci as $Lista)
                                                    <option value="{{ $Lista->id }}">
                                                        {{ $Lista->nombres }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-info" data-bs-toggle="popover" title="Informacion" data-bs-content="Seleccione el paciente">?</button>
                                        </div>
                                    <br>
                                    <br>

                                    <label>Medico</label>
                                        <div class="input-group mb-3">
                                            <select name="user_id" class=" form-control">
                                                @foreach($usu as $Lista)
                                                    <option value="{{ $Lista->id }}">
                                                        {{ $Lista->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-info" data-bs-toggle="popover" title="Informacion" data-bs-content="Seleccione el medico">?</button>
                                        </div>
                                    <br>
                                    <br>

                                    <label>¿Qué le gusta hacer en su tiempo libre?</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="tiempo_libre" value="{{ $Edita->tiempo_libre}}">
                                        <button type="button" class="btn btn-info" data-bs-toggle="popover" title="Informacion" data-bs-content="Escriba respuesta del paciente">?</button>
                                    </div>
                                        @error('tiempo_libre')
                                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                                        @enderror
                                    <br>
                                    <br>

                                    <label>¿Qué hace cuando está solo?</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="hace_solo" value="{{ $Edita->hace_solo}}">
                                        <button type="button" class="btn btn-info" data-bs-toggle="popover" title="Informacion" data-bs-content="Escriba respuesta del paciente">?</button>
                                    </div>
                                        @error('hace_solo')
                                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                                        @enderror
                                    <br>
                                    <br>

                                    <label>¿Qué no le gusta hacer?</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="no_gusta" value="{{ $Edita->no_gusta}}">
                                        <button type="button" class="btn btn-info" data-bs-toggle="popover" title="Informacion" data-bs-content="Escriba respuesta del paciente">?</button>
                                    </div>
                                        @error('no_gusta')
                                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                                        @enderror
                                    <br>
                                    <br>

                                    <label>¿Qué tipo de deportes le gustan?</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="deportes" value="{{ $Edita->deportes}}">
                                        <button type="button" class="btn btn-info" data-bs-toggle="popover" title="Informacion" data-bs-content="Escriba respuesta del paciente">?</button>
                                    </div>
                                        @error('deportes')
                                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                                        @enderror
                                    <br>
                                    <br>



                                    


                                </div>

                                <div class="col-6">
                                <br>
                                 


                                 <label>¿Qué programas de televisión mira?</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="programas" step="0.01" value="{{ $Edita->programas}}">
                                        <button type="button" class="btn btn-info" data-bs-toggle="popover" title="Informacion" data-bs-content="Escriba respuesta del paciente">?</button>
                                    </div>
                                        @error('programas')
                                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                                        @enderror
                                    <br>
                                    <br>   



                                    <label>¿Qué lo hace feliz?</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="felicidad" step="0.01" value="{{ $Edita->felicidad}}">
                                        <button type="button" class="btn btn-info" data-bs-toggle="popover" title="Informacion" data-bs-content="Escriba respuesta del paciente">?</button>
                                    </div>
                                        @error('felicidad')
                                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                                        @enderror
                                    <br>
                                    <br>




                                    <label>¿Qué lo entristece?</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="entristece" step="0.01" value="{{ $Edita->entristece}}">
                                         <button type="button" class="btn btn-info" data-bs-toggle="popover" title="Informacion" data-bs-content="Escriba respuesta del paciente">?</button>
                                    </div>
                                        @error('entristece')
                                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                                        @enderror
                                    <br>
                                    <br>

                                    <label>¿Qué lo enoja?</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="enojo" step="0.01" value="{{ $Edita->enojo}}">
                                         <button type="button" class="btn btn-info" data-bs-toggle="popover" title="Informacion" data-bs-content="Escriba respuesta del paciente">?</button>
                                    </div>
                                        @error('enojo')
                                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                                        @enderror
                                    <br>
                                    <br>

                                    <label>¿Sobre qué aspectos de la vida pregunta con mayor frecuencia?</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="aspec_vida" step="0.01" value="{{ $Edita->aspec_vida}}">
                                         <button type="button" class="btn btn-info" data-bs-toggle="popover" title="Informacion" data-bs-content="Escriba respuesta del paciente">?</button>
                                    </div>
                                        @error('aspec_vida')
                                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                                        @enderror
                                    <br>
                                    <br>

                                    <label>¿Qué tan bien se baña, se viste, come, duerme, en la actualidad?</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="habitos" step="0.01" value="{{ $Edita->habitos}}">
                                         <button type="button" class="btn btn-info" data-bs-toggle="popover" title="Informacion" data-bs-content="Escriba respuesta del paciente">?</button>
                                    </div>
                                        @error('habitos')
                                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                                        @enderror
                                    <br>
                                    <br>

                                    <br>
                                </div>
                            </div>
                            <br>
                            <input type="submit" value="Guardar" class="btn btn-success">
                            <a href="/home" type="button" class="btn btn-secondary">Regresar</a>

                            
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal">Info</button>
                            
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Informacion</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>En el formulario ingrese los datos solicitados, en algunos campos se debe introducir 
                                        los datos correctos de lo contrario el sistema no dejara ingresarlo, asi como tampoco 
                                        podra dejar un campo vacio.</p>
                                    </div>
                                    <div class="modal-footer">
                                        
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                        </form>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection