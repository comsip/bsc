@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1>Detalhes do Grupo</h1>
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $grupo->id }}</p>
                    <p><strong>Nome:</strong> {{ $grupo->nome }}</p>
                    <a href="{{ route('grupos.edit', $grupo->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir o questionário {{ $grupo->nome }}?')">Excluir</button>
                    </form>
                    <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Voltar para a lista</a>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Perguntas do Grupo</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nº</th>
                                <th>descrição</th>
                                <th>Opção 1</th>
                                <th>Opção 2</th>
                                <th>Opção 3</th>
                                <th>Opção 4</th>
                                <th>Opção 5</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perguntas as $pergunta)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pergunta->descricao }}</td>
                                <td>{{ $pergunta->op1 }}</td>
                                <td>{{ $pergunta->op2 }}</td>
                                <td>{{ $pergunta->op3 }}</td>
                                <td>{{ $pergunta->op4 }}</td>
                                <td>{{ $pergunta->op5 }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection