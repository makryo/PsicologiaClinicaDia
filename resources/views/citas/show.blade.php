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
                    <h1>Detalles de la cita</h1>
                    
                    <dl>
                    <div class="row">
                        <div class="col-6">
                            <dt>Nombre del paciente</dt><dd>{{ $cita->paciente->nombres }}</dd>
                            <dt>Nombre del medico</dt><dd>{{ $cita->user->name }}</dd>
                        </div>

                        <div class="col-6">
                            <dt>Mensajeria</dt><dd>{{ $cita->fecha_cita }}</dd>
                            <dt>Numero de telefono</dt><dd>{{ $cita->hora_cita }}</dd>
                            <dt>Fecha y hora de registro</dt><dd>{{ $cita->created_at }}</dd>
                        </div>
                    </div>
                    </dl>
                    <br>  
                    <a href="/home" type="button" class="btn btn-secondary">Regresar</a>

                    <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-warning">Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection