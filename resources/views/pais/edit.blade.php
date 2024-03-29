@extends('layouts.app')

@section('title', 'Edição - País')

@section('content')
    <div class="container">
        <h1>Editar país</h1>

        @auth
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('home-pais')}}">Países</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar país</li>
                </ol>
            </nav>
        @endauth

        <div>
            <form action="/pais/update/{{ $pais->id }}" method="POST" enctype="multipart/form-data">
                {{-- @csrf --}}
                {{-- @method('PUT') --}}
                {{ method_field('PUT') }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="nome">Nome <span class="campo-obrigatorio">*</span></label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ $pais->nome }}" autocomplete="off">
                    <span class="feedback-campo-obrigatorio">{{ $errors->has('nome') ? $errors->first('nome') : ''}}</span>
                </div>

                <div class="form-group">
                    <label for="capital">Capital</label>
                    <input type="text" class="form-control" id="capital" name="capital" value="{{ $pais->capital }}" placeholder="Ex.: Brasília" autocomplete="off">
                </div>
                
                <div class="form-group">
                    <label for="capital">Área total</label>
                    <input type="text" class="form-control" id="area" name="area" value="{{ $pais->area }}"placeholder="Ex.: 8510345.538 (use pontos ao invés de vírgulas)" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="continente">Continente <span class="campo-obrigatorio">*</span></label>
                    <select class="form-control" id="continente" name="fk_continente_id">
                        <option value="{{ $pais->relContinente->id ?? '' }}">{{ $pais->relContinente->nome ?? 'Selecione' }}</option>
                        @foreach ($continentes as $continente)
                            <option value="{{ $continente->id }}">{{ $continente->nome }}</option>
                        @endforeach
                    </select>
                </div>

                @if ($pais->relPaisBandeira == '')
                    <div class="form-group">
                        <label for="image">Bandeira</label>
                        <input type="file" id="image" name="image" class="form-control-file">
                    </div>
                @endif

                <div>
                    <input type="submit" class="btn btn-success" value="Atualizar">
                </div>
            </form>

            @if (isset($pais->relPaisBandeira->nome))
                <form action="{{ route('remove-bandeira') }}" method="POST" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="imagemBandeira" value="{{ $pais->relPaisBandeira->nome }}">
                    <p style="margin-top: 10px;"><b>Bandeira</b></p>
                    <img src="{{ asset('storage/' . $pais->relPaisBandeira->nome) }}">
                    <button type="submit" class="btn btn-danger">Remover imagem</button>
                </form>
            @endif

        </div>
    </div>
@endsection

