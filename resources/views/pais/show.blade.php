@extends('layouts.app')

@section('title', $pais->nome)

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 22px;">
            <div class="card mb-3" style="max-width: 540px; margin: auto;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $pais->relPaisBandeira->nome) }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $pais->nome }}</strong></h5>
                            <p class="card-text">Capital: {{ $pais->capital }}</p>
                            <p class="card-text">Área total: {{ $pais->area }} km²</p>
                            <p class="card-text">Continente: {{ $pais->relContinente->nome }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection