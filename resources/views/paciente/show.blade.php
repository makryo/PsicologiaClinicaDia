@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Detalles</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Detalles del paciente: {{ $paci->nombres }}</h1>
                    
                    <dl>
                    <div class="row">
                        <div class="col-6">
                            <dt>Nombre del medico</dt><dd>{{ $paci->user->name }}</dd>
                            <dt>Nombres</dt><dd>{{ $paci->nombres }}</dd>
                            <dt>Apellidos</dt><dd>{{ $paci->apellidos }}</dd>
                        </div>

                        <div class="col-6">
                            <dt>Mensajeria</dt><dd>{{ $paci->mensajeria }}</dd>
                            <dt>Numero de telefono</dt><dd>{{ $paci->telefono }}</dd>
                            <dt>Fecha y hora de registro</dt><dd>{{ $paci->created_at }}</dd>
                        </div>
                    </div>
                    </dl>
                    <br>  
                    <a href="/home" type="button" class="btn btn-secondary">Regresar</a>

                    <a href="{{ route('pacientes.edit', $paci->id) }}" class="btn btn-warning">Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection