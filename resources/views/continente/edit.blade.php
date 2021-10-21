@extends('layouts.app')

@section('title', 'Edição - Continente')

@section('content')
    <div class="container">
        <h1>Editar continente</h1>

        @auth
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('home-continente')}}">Continentes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar continente</li>
                </ol>
            </nav>
        @endauth

        <div>
            <form action="/continente/update/{{ $continente->id }}" method="POST" enctype="multipart/form-data">
                {{-- @csrf --}}
                {{-- @method('PUT') --}}
                {{ method_field('PUT') }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="nome">Nome <span class="campo-obrigatorio">*</span></label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.: América do Sul" value="{{ $continente->nome }}" autocomplete="off">
                    <span class="feedback-campo-obrigatorio">{{ $errors->has('nome') ? $errors->first('nome') : ''}}</span>
                </div>

                <div>
                    <input type="submit" class="btn btn-success" value="Atualizar">
                </div>
            </form>
        </div>
    </div>
@endsection

