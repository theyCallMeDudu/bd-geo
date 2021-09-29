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

                    <a href="{{ route('home-continente') }}" class="card col-sm-3 card-space card-border continentes">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-globe-americas" style="font-size: 14pt;"></i> Continentes
                            </h5>
                            <p class="card-text">Seu catálogo de continentes.</p>
                        </div>
                    </a>

                    <a href="{{ route('home-pais') }}" class="card col-sm-3 card-space card-border paises">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-flag-usa" style="font-size: 14pt;"></i> Países
                            </h5>
                            <p class="card-text">Seu catálogo de países.</p>
                        </div>
                    </a>
                    

                    <a href="{{ route('home-cidade') }}" class="card col-sm-3 card-space card-border cidades">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-city" style="font-size: 14pt;"></i> Cidades
                            </h5>
                            <p class="card-text">Seu catálogo de cidades.</p>
                        </div>
                    </a>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
