@extends('layouts.app')

@section('title', 'Cadastro - Cidade')

@section('content')
    <div class="container">
        <h1>Nova cidade</h1>

        @auth
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('home-cidade')}}">Cidades</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nova cidade</li>
                </ol>
            </nav>
        @endauth

        <div>
            <form action="{{ route('store-cidade') }}" method="POST" enctype="multipart/form-data">
                {{-- @csrf --}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.: Rio de Janeiro" required autocomplete="off">
                </div>
            
                <div class="form-group">
                    <label for="area">Área total</label>
                    <input type="text" class="form-control" id="area" name="area" placeholder="Ex.: 1255 (use pontos ao invés de vírgulas)" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="fundacao">Data de fundação</label>
                    <input type="date" class="form-control" id="fundacao" name="fundacao" placeholder="Ex.: 01/03/1565" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="continente">País</label>
                    <select class="form-control" id="pais" name="pais" required>
                        <option value="{{ $cidade->relPais->id ?? '' }}">{{ $cidade->relPais->id ?? 'Selecione' }}</option>
                        @foreach ($paises as $pais)
                            <option value="{{ $pais->id }}">{{ $pais->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Cartão postal</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                </div>

                <div>
                    <input type="submit" class="btn btn-success" value="Cadastrar">
                </div>
            </form>
        </div>
    </div>
@endsection

