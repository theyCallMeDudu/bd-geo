@extends('layouts.app')

@section('title', $pais->nome)

@section('content')
    <div class="container">

        @auth
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('home-pais')}}">Países</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Visualizar país</li>
                </ol>
            </nav>
        @endauth

        <div class="row" style="margin-top: 22px;">
            <div class="card mb-3" style="max-width: 540px; margin: auto;">
                <div class="row g-0">
                    <div class="col-md-4">
                        @if (isset($pais->relPaisBandeira->nome))
                            <img src="{{ asset('storage/' . $pais->relPaisBandeira->nome) }}"  class="img-fluid rounded-start" alt="{{ $pais->nome }}"/>
                        @else
                            <img src="/img/sem_foto.jpg" class="img-fluid rounded-start" alt="{{ $pais->nome }}">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $pais->nome }}</strong></h5>
                            <p class="card-text">Capital: {{ $pais->capital }}</p>
                            
                            @if (isset($pais->area))
                                <p class="card-text">Área total: {{ $pais->area }} km²</p>
                            @else
                                <p class="card-text">Área total: não informado</p>
                            @endif

                            <p class="card-text">Continente: {{ $pais->relContinente->nome }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection