@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if($errors->any())

            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                    @endforeach
                </ul>
            </div>

            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Adicionar Pergunta</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('perguntas.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input type="text" name="descricao" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="grupo_id">Questionário</label>
                            <select name="grupo_id" class="form-control" required>
                                <option value="">Selecione um questionário</option>
                                @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id }}">{{ $grupo->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="{{ route('perguntas.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection