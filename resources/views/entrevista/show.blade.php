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
                    <h1>Detalles de la entrevista</h1>
                    
                    <dl>
                    <div class="row">
                        <div class="col-6">
                            <dt>Nombre del paciente</dt><dd>{{ $entre->paciente->nombres }}</dd>
                            <dt>Nombre del medico</dt><dd>{{ $entre->user->name }}</dd>
                            <dt>¿Qué le gusta hacer en su tiempo libre?</dt><dd>{{ $entre->tiempo_libre }}</dd>
                            <dt>¿Qué hace cuando está solo?</dt><dd>{{ $entre->hace_solo }}</dd>
                            <dt>¿Qué no le gusta hacer?</dt><dd>{{ $entre->no_gusta }}</dd>
                            <dt>¿Qué tipo de deportes le gustan?</dt><dd>{{ $entre->deportes }}</dd>
                            <dt>¿Qué programas de televisión mira?</dt><dd>{{ $entre->programas }}</dd>
                        </div>

                        <div class="col-6">
                            
                            <dt>¿Qué lo hace feliz?</dt><dd>{{ $entre->felicidad }}</dd>
                            <dt>¿Qué lo entristece?</dt><dd>{{ $entre->entristece }}</dd>
                            <dt>¿Qué lo enoja?</dt><dd>{{ $entre->enojo }}</dd>
                            
                            <dt>¿Sobre qué aspectos de la vida pregunta con mayor frecuencia?</dt><dd>{{ $entre->aspec_vida }}</dd>
                            <dt>¿Qué tan bien se baña, se viste, come, duerme, en la actualidad?</dt><dd>{{ $entre->habitos }}</dd>
                            <dt>Fecha y hora de registro</dt><dd>{{ $entre->created_at }}</dd>
                        </div>
                    </div>
                    </dl>
                    <br>  
                    <a href="/home" type="button" class="btn btn-secondary">Regresar</a>

                    <a href="{{ route('entrevistas.edit', $entre->id) }}" class="btn btn-warning">Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection