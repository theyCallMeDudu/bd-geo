@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Continentes</h1>
        <a type="button" class="btn btn-success" style="float: right;" href="{{ route('create-continente') }}">Novo</a>
        <table class="table table-success able-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($continentes as $continente)
                <tr>
                <td>{{ $continente->nome }}</td>
                <td>
                    {{-- Botão de editar --}}
                    <a type="button" class="btn btn-primary" href="/continente/edit/{{ $continente->id }}">
                        Editar
                    </a>

                    {{-- Form e botão de excluir --}}
                    <form action="/continente/{{ $continente->id }}" method="POST" style="display: inline-block;">
                        {{-- <input type="hidden" name="_method" value="delete"/> --}}
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