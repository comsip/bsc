@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Grupos</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <a href="{{ route('grupos.create') }}" class="btn btn-primary">Adicionar Grupo</a>
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
                                <th>Nome</th>
                                <th>Questionario</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grupos as $grupo)
                            <tr>
                                <td>{{ $grupo->id }}</td>
                                <td>{{ $grupo->nome }}</td>
                                <td>{{ $grupo->questionario->nome }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('grupos.edit', $grupo->id) }}" class="btn btn-warning m-1">Editar</a>
                                        <a href="{{ route('grupos.show', $grupo->id) }}" class="btn btn-primary m-1">Detalhar</a>
                                        <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger m-1" onclick="return confirm('Tem certeza que deseja excluir este grupo?')">Excluir</button>
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