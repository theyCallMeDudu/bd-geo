@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card col-sm-4">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-globe-americas" style="font-size: 14pt;"></i> Continentes
                            </h5>
                            <p class="card-text">Seu catálogo de continentes.</p>
                            <a href="{{ route('home-continente') }}" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>

                    <div class="card col-sm-4">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-flag-usa" style="font-size: 14pt;"></i> Países
                            </h5>
                            <p class="card-text">Seu catálogo de países.</p>
                            <a href="{{ route('home-pais') }}" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>                    
                    
                    <div class="card col-sm-4">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-city" style="font-size: 14pt;"></i> Cidades
                            </h5>
                            <p class="card-text">Seu catálogo de cidades.</p>
                            <a href="{{ route('home-pais') }}" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
