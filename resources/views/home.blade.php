<?php

use Illuminate\Support\Facades\DB;

$datos = DB::select('select id, nombres, apellidos, telefono, TIMESTAMPDIFF(YEAR,edad,CURDATE()) AS edad, created_at from pacientes');

$datosCitas = DB::select('select citas.id, pacientes.nombres, users.name, fecha_cita, hora_cita from citas, pacientes, users 
where citas.paciente_id = pacientes.id
and citas.user_id = users.id order by citas.id');

$datosentre = DB::select('select entrevistas.id, pacientes.nombres, pacientes.apellidos, users.name 
from pacientes, users, entrevistas
where entrevistas.user_id = users.id
and entrevistas.paciente_id = pacientes.id;');

$datosreceta = DB::select('select recetas.id, pacientes.nombres, pacientes.apellidos, users.name, medici_one, indica_one, recetas.created_at 
from pacientes, users, recetas
where recetas.user_id = users.id
and recetas.paciente_id = pacientes.id');

$datosnota = DB::select('select nota_evolutivas.id, pacientes.nombres, pacientes.apellidos, nota_evolutivas.created_at 
from nota_evolutivas, users, pacientes
where nota_evolutivas.user_id = users.id
and nota_evolutivas.paciente_id = pacientes.id');
?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container mt-3">
            <br>
            <h2>Menu Principal</h2>
            <br>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#home">Pacientes</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu1">Citas</a>
                </li>
                    
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu2">Entrevistas</a>    
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu3">Recetas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu4">Notas Evolutivas</a>
                </li>

            </ul>

            <!-- Tab panes -->
                        
            <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>                    
                    <h3>Pacientes</h3>
                    <a href="{{route('pacientes.create')}}" class="btn btn-primary">Nuevo Paciente</a>
                    <a href="{{ route('reportePaciente') }}" class="btn btn-primary">Generar Reporte general</a>
                    <br>
                    <br>
                    <h3>Buscar</h3>
                    <input type="text" id="searchTerm" onkeyup="doSearch()" class="form-control">
                    <br>
                    <br>
                    <table class="table" id="datos">
                        <thead>
                            <tr>                     
                                <th scope="col">ID</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Fecha y hora</th>
                                <th scope="col">Detalles de la entrevista</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($datos as $Lista)
                            <tr>
                                <td>{{$Lista->id}}</td>
                                <td>{{$Lista->nombres}}</td>
                                <td>{{$Lista->apellidos}}</td>
                                <td>{{$Lista->telefono}}</td>
                                <td>{{$Lista->edad}}</td>
                                <td>{{$Lista->created_at}}</td>
                                <td>
                                    <a href="{{ route('pacientes.show', $Lista->id) }}" class="btn btn-success">Detalles</a>
                                    <br>
                                    <br>
                                </td>
                            </tr>
                            @endforeach
                            <tr class='noSearch hide'>
                                <td colspan="5"></td>
                            </tr>
                        </tbody>

                    </table>
                </div>

                <div id="menu1" class="container tab-pane fade"><br>
                    <h3>Citas</h3>
                    <a href="{{route('citas.create')}}" class="btn btn-primary">Nueva Cita</a>
                    <br>
                    <br>
                    <h3>Buscar</h3>
                    <input type="text" id="searchTerm1" onkeyup="doSearch1()" class="form-control">
                    <br>
                    <br>
                    <table class="table" id="datos1">
                        <thead>
                            <tr>                     
                                <th scope="col">ID</th>
                                <th scope="col">Nombre del paciente</th>
                                <th scope="col">Nombre del medico</th>
                                <th scope="col">fecha de la cita asignada</th>
                                <th scope="col">hora de la cita asignada</th>
                                <th scope="col">Detalles</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($datosCitas as $Lista)
                            <tr>
                                <td>{{$Lista->id}}</td>
                                <td>{{$Lista->nombres}}</td>
                                <td>{{$Lista->name}}</td>
                                <td>{{$Lista->fecha_cita}}</td>
                                <td>{{$Lista->hora_cita}}</td>
                                <td>
                                    <a href="{{ route('citas.show', $Lista->id) }}" class="btn btn-success">Detalles</a>
                                    <a href="{{ route('generarPdf', $Lista->id) }}" class="btn btn-primary">Generar Comprobante</a>
                                    <br>
                                    <br>
                                </td>
                            </tr>
                            @endforeach
                            <tr class='noSearch hide'>
                                <td colspan="5"></td>
                            </tr>
                        </tbody>

                    </table>
                </div>

                <div id="menu2" class="container tab-pane fade"><br>
                    <h3>Entrevistas</h3>
                    <a href="{{route('entrevistas.create')}}" class="btn btn-primary">Nueva entrevista</a>
                    <br>
                    <br>
                    <h3>Buscar</h3>
                    <input type="text" id="searchTerm2" onkeyup="doSearch2()" class="form-control">
                    <br>
                    <br>
                    <table class="table" id="datos2">
                        <thead>
                            <tr>                     
                                <th scope="col">ID</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Medico entrevistador</th>
                                <th scope="col">Detalles</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($datosentre as $Lista)
                            <tr>
                                <td>{{$Lista->id}}</td>
                                <td>{{$Lista->nombres}}</td>
                                <td>{{$Lista->apellidos}}</td>
                                <td>{{$Lista->name}}</td>
                                <td>
                                    <a href="{{ route('entrevistas.show', $Lista->id) }}" class="btn btn-success">Detalles</a>
                                    <a href="{{ route('reporteEntrevista', $Lista->id) }}" class="btn btn-primary">Generar reporte</a>
                                    <br>
                                    <br>
                                </td>
                            </tr>
                            @endforeach
                            <tr class='noSearch hide'>
                                <td colspan="5"></td>
                            </tr>
                        </tbody>

                    </table>
                </div>

                

                <div id="menu3" class="container tab-pane fade"><br>
                    <h3>Recetas</h3>
                    <a href="{{route('recetas.create')}}" class="btn btn-primary">Nueva Receta</a>
                    <br>
                    <br>
                    <h3>Buscar</h3>
                    <input type="text" id="searchTerm3" onkeyup="doSearch3()" class="form-control">
                    <br>
                    <br>
                    <table class="table" id="datos3">
                        <thead>
                            <tr>                     
                                <th scope="col">ID</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Medico</th>
                                <th scope="col">Medicamento 1</th>
                                <th scope="col">Indicaciones</th>
                                <th scope="col">Fecha y hora</th>
                                <th scope="col">Detalles</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($datosreceta as $Lista)
                            <tr>
                                <td>{{$Lista->id}}</td>
                                <td>{{$Lista->nombres}}</td>
                                <td>{{$Lista->apellidos}}</td>
                                <td>{{$Lista->name}}</td>
                                <td>{{$Lista->medici_one}}</td>
                                <td>{{$Lista->indica_one}}</td>
                                <td>{{$Lista->created_at}}</td>
                                <td>
                                    <a href="{{ route('recetas.show', $Lista->id) }}" class="btn btn-success">Detalles</a>
                                    <a href="{{ route('reporteReceta', $Lista->id) }}" class="btn btn-primary">Generar reporte</a>
                                    <br>
                                    <br>
                                </td>
                            </tr>
                            @endforeach
                            <tr class='noSearch hide'>
                                <td colspan="5"></td>
                            </tr>
                        </tbody>

                    </table>
                </div>

                <div id="menu4" class="container tab-pane fade"><br>
                    <h3>Notas Evolutivas</h3>
                    <a href="{{route('notasEvolutivas.create')}}" class="btn btn-primary">Nueva Nota</a>
                    <br>
                    <br>
                    <h3>Buscar</h3>
                    <input type="text" id="searchTerm4" onkeyup="doSearch4()" class="form-control">
                    <br>
                    <br>
                    
                    <table class="table" id="datos4">
                        <thead>
                            <tr>                     
                                <th scope="col">ID</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Fecha y hora</th>
                                <th scope="col">Detalles</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($datosnota as $Lista)
                            <tr>
                                <td>{{$Lista->id}}</td>
                                <td>{{$Lista->nombres}}</td>
                                <td>{{$Lista->apellidos}}</td>
                                <td>{{$Lista->created_at}}</td>
                                <td>
                                    <a href="{{ route('notasEvolutivas.show', $Lista->id) }}" class="btn btn-success">Detalles</a>
                                    <a href="{{ route('reporteNotaEvolutiva', $Lista->id) }}" class="btn btn-primary">Generar reporte</a>
                                    <br>
                                    <br>
                                </td>
                            </tr>
                            @endforeach
                            <tr class='noSearch hide'>
                                <td colspan="5"></td>
                            </tr>
                        </tbody>

                    </table>
                </div>

                
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
