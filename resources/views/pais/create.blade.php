@extends('layouts.app')

@section('title', 'Cadastro - País')

@section('content')
    <div class="container">
        <h1>Novo país</h1>

        <div>
            <form action="{{ route('store-pais') }}" method="POST" enctype="multipart/form-data">
                {{-- @csrf --}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.: Brasil" required autocomplete="off">
                </div>
                
                <div class="form-group">
                    <label for="capital">Capital</label>
                    <input type="text" class="form-control" id="capital" name="capital" placeholder="Ex.: Brasília" required autocomplete="off">
                </div>
                
                <div class="form-group">
                    <label for="capital">Área total</label>
                    <input type="text" class="form-control" id="area" name="area" placeholder="Ex.: 8510345.538 (use pontos ao invés de vírgulas)" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="continente">Continente</label>
                    <select class="form-control" id="continente" name="continente" required>
                        <option value="{{ $pais->relContinente->id ?? '' }}">{{ $pais->relContinente->id ?? 'Selecione' }}</option>
                        @foreach ($continentes as $continente)
                            <option value="{{ $continente->id }}">{{ $continente->nome }}</option>
                        @endforeach
                    </select>
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
