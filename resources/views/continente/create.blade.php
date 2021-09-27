@extends('layouts.app')

@section('title', 'Cadastro - Continente')

@section('content')
    <div class="container">
        <h1>Novo continente</h1>

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

