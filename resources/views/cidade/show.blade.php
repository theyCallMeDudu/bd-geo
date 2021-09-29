@extends('layouts.app')

@section('title', $cidade->nome)

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 22px;">
            <div class="card mb-3" style="max-width: 540px; margin: auto;">
                <div class="row g-0">
                    <div class="col-md-4" style="margin-right: 30px;">
                        <img src="{{ asset('storage/' . $cidade->relCidadePostal->nome) }}" class="img-fluid rounded-start" alt="Cartão postal de {{ $cidade->nome }}" width="200">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $cidade->nome }}</strong></h5>
                            <p class="card-text">Área total: {{ $cidade->area }} km²</p>
                            <p class="card-text">Fundação: {{ $fundacaoFormatada }} </p>
                            <p class="card-text">País: {{ $cidade->relPais->nome }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection