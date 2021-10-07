@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 id="h1-continentes">Continentes</h1>
        @auth
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Continentes</li>
                </ol>
            </nav>
        @endauth
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

                        {{-- Botão de excluir (chama modal de exclusão) --}}
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-del-continente-{{ $continente->id }}">Excluir</button>

                        <!-- Modal de exclusão -->
                        <div class="modal fade" id="modal-del-continente-{{ $continente->id }}" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Excluir continente</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Deseja realmente excluir este continente?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                                        
                                        {{-- Form e botão de excluir --}}
                                        <form action="/continente/{{ $continente->id }}" method="POST" style="display: inline-block;">
                                            {{-- <input type="hidden" name="_method" value="delete"/> --}}
                                            {{ method_field('PUT') }}
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            
                                            <button type="submit" class="btn btn-danger">
                                                Sim
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginação -->
        <div class="pages">
            <p>
                {{ $continentes->links() }}
            </p>
        </div>

    </div>
@endsection