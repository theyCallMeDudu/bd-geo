@extends('layouts.app')

@section('title', 'Cadastro - Continente')

@section('content')
    <div class="container">
        <h1>Novo continente</h1>
        
        @auth
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('home-continente')}}">Continentes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Novo continente</li>
                </ol>
            </nav>
        @endauth

        <div>
            <form action="{{ route('store-continente') }}" method="POST" enctype="multipart/form-data">
                {{-- @csrf --}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.: América do Sul" required autocomplete="off">
                </div>

                <div>
                    <input type="submit" class="btn btn-success" value="Cadastrar">
                </div>
            </form>
        </div>
    </div>
@endsection

