@extends('layouts.livraria')

@section('titulo','Livraria Online')

@section('conteudo')
    <div class="row mt-3">
        @foreach ($livros as $livro)
            <div class="col-md-3">
                <a href="{{ route('detalhes.livro', $livro->id) }}">
                    <div class="card">
                    <img src="{{ url("/storage/$livro->capa") }}" class="card-img-top" alt="{{ $livro->nome }}">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $livro->nome }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted text-center"> R$ {{ $livro->valor }}</h6>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="row mt-3">
        <div class="col-12">
            {{ $livros->links() }}
        </div>
    </div>
@endsection