@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 id="h1-paises">Países</h1>

        @auth
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item">Países</li>
                </ol>
            </nav>
        @endauth

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

                    {{-- Botão de excluir (chama modal de exclusão) --}}
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-del-pais-{{ $pais->id }}">Excluir</button>

                    <!-- Modal de exclusão -->
                    <div class="modal fade" id="modal-del-pais-{{ $pais->id }}" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Excluir país</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Deseja realmente excluir este país?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                                    
                                    {{-- Form e botão de excluir --}}
                                    <form action="/pais/{{ $pais->id }}" method="POST" style="display: inline-block;">
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
                {{ $paises->links() }}
            </p>
        </div>
    </div>
@endsection