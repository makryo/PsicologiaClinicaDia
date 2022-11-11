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
                    <h1>Actualizar datos de la nota evolutiva</h1>
                    <div class="container">
                    @if(session()->has('success'))

                    <!--//modal code goes here-->
                    
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Well done!</strong> {{ session()->get('success') }}
                    </div>
                    <!--<div class="text-success">{{ session()->get('success') }}</div>-->

                    @endif
                        
                    <!-- -->
                        <form method="post" action="{{route('notasEvolutivas.update', $Edita->id)}}">
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

                                    

                                    <label>Observaciones</label>
                                    <div class="input-group mb-3">
                                    <textarea class="form-control" name="observacion" value="{{ $Edita->observacion}}">{{ $Edita->observacion}}</textarea>
                                        
                                        <button type="button" class="btn btn-info" data-bs-toggle="popover" title="Informacion" data-bs-content="Escriba sus observaciones del paciente">?</button>
                                    </div>
                                        @error('observacion')
                                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                                        @enderror
                                    <br>
                                    <br>

                                </div>

                                <div class="col-6">
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