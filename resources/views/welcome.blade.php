@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div align="center">
                <img src="https://i.ibb.co/68LMMpt/png-clipart-sigmund-freud-leben-und-sterben-civilization-and-its-discontents-psychoanalysis-freud-s.png" alt="png-clipart-sigmund-freud-leben-und-sterben-civilization-and-its-discontents-psychoanalysis-freud-s-">
                <br>                
                <h1>Clinica Psicologica Dia</h1>
                <a href="{{ route('login') }}">
                    <input type="button" class="btn btn-primary" value="Iniciar sesion">
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
