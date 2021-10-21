@extends('layouts.app')

@section('title', 'Cadastro - País')

@section('content')
    <div class="container">
        <h1>Novo país</h1>

        @auth
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('home-pais')}}">Países</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Novo país</li>
                </ol>
            </nav>
        @endauth

        <div>
            <form action="{{ route('store-pais') }}" method="POST" enctype="multipart/form-data">
                {{-- @csrf --}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="nome">Nome <span class="campo-obrigatorio">*</span></label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.: Brasil" autocomplete="off">
                    <span class="feedback-campo-obrigatorio">{{ $errors->has('nome') ? $errors->first('nome') : ''}}</span>
                </div>
                
                <div class="form-group">
                    <label for="capital">Capital</label>
                    <input type="text" class="form-control" id="capital" name="capital" placeholder="Ex.: Brasília" autocomplete="off">
                </div>
                
                <div class="form-group">
                    <label for="capital">Área total</label>
                    <input type="text" class="form-control" id="area" name="area" placeholder="Ex.: 8510345.538 (use pontos ao invés de vírgulas)" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="continente">Continente <span class="campo-obrigatorio">*</span></label>
                    <select class="form-control" id="continente" name="continente">
                        <option value="{{ $pais->relContinente->id ?? '' }}">{{ $pais->relContinente->id ?? 'Selecione' }}</option>
                        @foreach ($continentes as $continente)
                            <option value="{{ $continente->id }}">{{ $continente->nome }}</option>
                        @endforeach
                    </select>
                    <span class="feedback-campo-obrigatorio">{{ $errors->has('continente') ? $errors->first('continente') : ''}}</span>
                </div>



                <div class="form-group">
                    <label for="image">Bandeira</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                </div>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Cadastrar">
                </div>
            </form>
        </div>
    </div>
@endsection

