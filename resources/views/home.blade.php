@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card border-success col-sm-6">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Continentes</h5>
                            <p class="card-text">Seu catálogo de continentes.</p>
                            <a href="{{ route('home-continente') }}" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>

                    <div class="card col-sm-6">
                        <img src="assets/brasil.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Países</h5>
                            <p class="card-text">Seu catálogo de países.</p>
                            <a href="" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
