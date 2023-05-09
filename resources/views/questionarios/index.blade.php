@extends('layouts.app')

@section('content')
<div class="container">

    <a href="{{ route('questionarios.create') }}" class="btn btn-primary mb-1">Novo questionário</a>
    @if($message = Session::get('success'))

    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    @if($questionarios->count() > 0)
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>
                        <h1>Lista de questionários</h1>
                    </b></div>
                <div class="col col-md-6">
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questionarios as $questionario)
                    <tr>
                        <td>{{ $questionario->id }}</td>
                        <td>{{ $questionario->nome }}</td>
                        <td>
                            <a href="{{ route('questionarios.show', $questionario->id) }}" class="btn btn-info">Detalhes</a>
                            <a href="{{ route('questionarios.edit', $questionario->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('questionarios.destroy', $questionario->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir o questionário {{ $questionario->nome }}?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p>Nenhum questionário cadastrado.</p>
        @endif
    </div>
    @endsection