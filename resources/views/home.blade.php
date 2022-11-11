<?php
$datos = DB::select('select id, nombres, apellidos, telefono, created_at from pacientes');
$datosCitas = DB::select('select citas.id, pacientes.nombres, users.name, fecha_cita, hora_cita from citas, pacientes, users 
where citas.paciente_id = pacientes.id
and citas.user_id = users.id order by citas.id');
$datosentre = DB::select('select entrevistas.id, pacientes.nombres, pacientes.apellidos, users.name 
from pacientes, users, entrevistas
where entrevistas.user_id = users.id
and entrevistas.paciente_id = pacientes.id;')
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
                    <a class="nav-link" data-bs-toggle="tab" href="#menu4">Historial</a>
                </li>

            </ul>

            <!-- Tab panes -->
                        
            <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>                    
                    <h3>Pacientes</h3>
                    <a href="{{route('pacientes.create')}}" class="btn btn-primary">Nuevo Paciente</a>
                    <br>
                    <br>
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
                    <input type="text" id="searchTerm" onkeyup="doSearch()" class="form-control">
                    <br>
                    <br>
                    <table class="table" id="datos">
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
                    <input type="text" id="searchTerm" onkeyup="doSearch()" class="form-control">
                    <br>
                    <br>
                    <table class="table" id="datos">
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
                    <a href="{{route('pacientes.create')}}" class="btn btn-primary">Nuevo Paciente</a>
                    <br>
                    <br>
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
                                <th scope="col">Fecha y hora</th>
                                <th scope="col">Detalles</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($datos as $Lista)
                            <tr>
                                <td>{{$Lista->id}}</td>
                                <td>{{$Lista->nombres}}</td>
                                <td>{{$Lista->apellidos}}</td>
                                <td>{{$Lista->telefono}}</td>
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

                <div id="menu4" class="container tab-pane fade"><br>
                    <h3>Historial</h3>
                    <a href="{{route('pacientes.create')}}" class="btn btn-primary">Nuevo Paciente</a>
                    <br>
                    <br>
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
                                <th scope="col">Fecha y hora</th>
                                <th scope="col">Detalles</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($datos as $Lista)
                            <tr>
                                <td>{{$Lista->id}}</td>
                                <td>{{$Lista->nombres}}</td>
                                <td>{{$Lista->apellidos}}</td>
                                <td>{{$Lista->telefono}}</td>
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

                
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
