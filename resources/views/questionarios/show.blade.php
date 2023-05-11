@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2>Detalhes do questionário</h2>
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $questionario->id }}</p>
                    <p><strong>Nome:</strong> {{ $questionario->nome }}</p>
                    <a href="{{ route('questionarios.edit', $questionario->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('questionarios.destroy', $questionario->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir o questionário {{ $questionario->nome }}?')">Excluir</button>
                    </form>
                    <a href="{{ route('questionarios.index') }}" class="btn btn-secondary">Voltar para a lista</a>
                </div>

            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Grupos do Questionário</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grupos as $grupo)
                            <tr>
                                <td>{{ $grupo->nome }}</td>
                                <td>
                                    <a href="{{ route('grupos.edit', $grupo->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
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