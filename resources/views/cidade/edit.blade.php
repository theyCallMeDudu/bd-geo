@extends('layouts.app')

@section('title', 'Edição - Cidade')

@section('content')
    <div class="container">
        <h1>Editar cidade</h1>

        <div>
            <form action="/cidade/update/{{ $cidade->id }}" method="POST" enctype="multipart/form-data">
                {{-- @csrf --}}
                {{-- @method('PUT') --}}
                {{ method_field('PUT') }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ $cidade->nome }}" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="area">Área total</label>
                    <input type="text" class="form-control" id="area" name="area" value="{{ $cidade->area }}" placeholder="Ex.: 1255" autocomplete="off">
                </div>
                
                <div class="form-group">
                    <label for="fundacao">Data de fundação</label>
                    <input type="date" class="form-control" id="fundacao" name="fundacao" value="{{ $cidade->fundacao }}"placeholder="Ex.: 01/03/1565" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="pais">País</label>
                    <select class="form-control" id="pais" name="fk_pais_id">
                        <option value="{{ $cidade->relPais->id ?? '' }}">{{ $cidade->relPais->nome ?? 'Selecione' }}</option>
                        @foreach ($paises as $pais)
                            <option value="{{ $pais->id }}">{{ $pais->nome }}</option>
                        @endforeach
                    </select>
                </div>

                @if ($cidade->relCidadePostal == '')
                    <div class="form-group">
                        <label for="image">Cartão postal</label>
                        <input type="file" id="image" name="image" class="form-control-file">
                    </div>
                @endif

                <div>
                    <input type="submit" class="btn btn-success" value="Atualizar">
                </div>
            </form>

            @if (isset($cidade->relCidadePostal->nome))
                <form action="{{ route('remove-postal') }}" method="POST" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="imagemPostal" value="{{ $cidade->relCidadePostal->nome }}">
                    <p style="margin-top: 10px;"><b>Cartão postal</b></p>
                    <img src="{{ asset('storage/' . $cidade->relCidadePostal->nome) }}" width="100">
                    <button type="submit" class="btn btn-danger">Remover imagem</button>
                </form>
            @endif

        </div>
    </div>
@endsection

