@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cidades</h1>
        <a type="button" class="btn btn-success" style="float: right;" href="{{ route('create-cidade') }}">Nova</a>
        <table class="table table-success able-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Cartão postal</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cidades as $cidade)
                <tr>
                <td>{{ $cidade->nome }}</td>
                <td>
                    @if (isset($cidade->relCidadePostal->nome))
                        <img src="{{ asset('storage/' . $cidade->relCidadePostal->nome) }}" alt="{{ $cidade->nome }}" width="50" height="30" />
                    @else
                        <img src="/img/sem_foto.jpg" alt="{{ $cidade->nome }}" width="50" height="30">
                    @endif
                </td>
                <td>
                    {{-- Botão de visualizar --}}
                    <a type="button" class="btn btn-info" href="/cidade/{{ $cidade->id }}">
                        Visualizar
                    </a>

                    {{-- Botão de editar --}}
                    <a type="button" class="btn btn-primary" href="/cidade/edit/{{ $cidade->id }}">
                        Editar
                    </a>

                    {{-- Form e botão de excluir --}}
                    <form action="/cidade/{{ $cidade->id }}" method="POST" style="display: inline-block;">
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