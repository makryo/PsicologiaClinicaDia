@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('login') }}">
                <input type="button" class="btn btn-primary" value="Iniciar sesion">
            </a>
        </div>
    </div>
</div>

@endsection
