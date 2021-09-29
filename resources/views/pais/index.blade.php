@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 id="h1-paises">Países</h1>
        <a type="button" class="btn btn-success" style="float: right;" href="{{ route('create-pais') }}">Novo</a>
        <table class="table table-success able-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Bandeira</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paises as $pais)
                <tr>
                <td>{{ $pais->nome }}</td>
                <td>
                    @if (isset($pais->relPaisBandeira->nome))
                        <img src="{{ asset('storage/' . $pais->relPaisBandeira->nome) }}" alt="{{ $pais->nome }}" width="50" height="30" />
                    @else
                        <img src="/img/sem_foto.jpg" alt="{{ $pais->nome }}" width="50" height="30">
                    @endif
                </td>
                <td>
                    {{-- Botão de visualizar --}}
                    <a type="button" class="btn btn-info" href="/pais/{{ $pais->id }}">
                        Visualizar
                    </a>

                    {{-- Botão de editar --}}
                    <a type="button" class="btn btn-primary" href="/pais/edit/{{ $pais->id }}">
                        Editar
                    </a>

                    {{-- Form e botão de excluir --}}
                    <form action="/pais/{{ $pais->id }}" method="POST" style="display: inline-block;">
                        {{ method_field('PUT') }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <button type="submit" class="btn btn-danger">
                            Excluir
                        </button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection