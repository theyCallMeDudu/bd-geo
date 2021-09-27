@extends('layouts.app')

@section('title', 'Edição - Continente')

@section('content')
    <div class="container">
        <h1>Editar continente</h1>

        <div>
            <form action="/continente/update/{{ $continente->id }}" method="POST" enctype="multipart/form-data">
                {{-- @csrf --}}
                {{-- @method('PUT') --}}
                {{ method_field('PUT') }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.: América do Sul" value="{{ $continente->nome }}" required autocomplete="off">
                </div>

                <div>
                    <input type="submit" class="btn btn-success" value="Atualizar">
                </div>
            </form>
        </div>
    </div>
@endsection

