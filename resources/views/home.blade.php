<?php
$datos = DB::select('select id, nombres, apellidos, telefono, created_at from pacientes');
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
                    <a class="nav-link" data-bs-toggle="tab" href="#menu3">Medicamentos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu4">Recetas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu5">Historial</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu6">Reportes</a>
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

                <div id="menu1" class="container tab-pane fade"><br>
                    <h3>Citas</h3>
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

                <div id="menu2" class="container tab-pane fade"><br>
                    <h3>Entrevistas</h3>
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

                <div id="menu3" class="container tab-pane fade"><br>
                    <h3>Medicamentos</h3>
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

                <div id="menu5" class="container tab-pane fade"><br>
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

                <div id="menu6" class="container tab-pane fade"><br>
                    <h3>Reportes</h3>
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
