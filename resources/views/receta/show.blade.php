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
                    <h1>Detalles de la receta del paciente {{ $rece->paciente->nombres }}</h1>
                    
                    <dl>
                    <div class="row">
                        <div class="col-6">
                            <dt>Nombre del paciente</dt><dd>{{ $rece->paciente->nombres }}</dd>
                            <dt>Nombre del medico</dt><dd>{{ $rece->user->name }}</dd>
                            <dt>1.er Medicamento</dt><dd>{{ $rece->medici_one }}</dd>
                            <dt>Indicaciones</dt><dd>{{ $rece->indica_one }}</dd>
                            <dt>2.do Medicamento</dt><dd>{{ $rece->medici_two }}</dd>
                            <dt>Indicaciones</dt><dd>{{ $rece->indica_two }}</dd>
                            
                        </div>

                        <div class="col-6">
                            <dt>3.er Medicamento</dt><dd>{{ $rece->medici_three }}</dd>
                            <dt>Indicaciones</dt><dd>{{ $rece->indica_three }}</dd>
                            <dt>4.to Medicamento</dt><dd>{{ $rece->medici_four }}</dd>
                            <dt>Indicaciones</dt><dd>{{ $rece->indica_four }}</dd>                           
                            <dt>5.to Medicamento</dt><dd>{{ $rece->medici_five }}</dd>
                            <dt>Indicaciones</dt><dd>{{ $rece->indica_five }}</dd>
                            <dt>Fecha y hora de registro</dt><dd>{{ $rece->created_at }}</dd>
                        </div>
                    </div>
                    </dl>
                    <br>  
                    <a href="/home" type="button" class="btn btn-secondary">Regresar</a>

                    <a href="{{ route('recetas.edit', $rece->id) }}" class="btn btn-warning">Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection