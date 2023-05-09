@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Perguntas</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <a href="{{ route('perguntas.create') }}" class="btn btn-primary">Adicionar Pergunta</a>
                        </div>
                    </div>
                    @if($message = Session::get('success'))

                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Grupo</th>
                                <th>Descrição</th>
                                <th>Opção 1</th>
                                <th>Opção 2</th>
                                <th>Opção 3</th>
                                <th>Opção 4</th>
                                <th>Opção 5</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perguntas as $pergunta)
                            <tr>
                                <td>{{ $pergunta->id }}</td>
                                <td>{{ $pergunta->grupo->nome }}</td>
                                <td>{{ $pergunta->descricao }}</td>
                                <td>{{ $pergunta->op1 }}</td>
                                <td>{{ $pergunta->op2 }}</td>
                                <td>{{ $pergunta->op3 }}</td>
                                <td>{{ $pergunta->op4 }}</td>
                                <td>{{ $pergunta->op5 }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('perguntas.edit', $pergunta->id) }}" class="btn btn-warning m-1">Editar</a>
                                        <a href="{{ route('perguntas.show', $pergunta->id) }}" class="btn btn-primary m-1">Detalhar</a>
                                        <form action="{{ route('perguntas.destroy', $pergunta->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger m-1" onclick="return confirm('Tem certeza que deseja excluir este pergunta?')">
                                                Excluir</button>
                                        </form>
                                    </div>
                                </td>
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