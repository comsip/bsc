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
                            <label for="op1">Opção 1</label>
                            <input type="text" name="op1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="op2">Opção 2</label>
                            <input type="text" name="op2" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="op3">Opção 3</label>
                            <input type="text" name="op3" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="op4">Opção 4</label>
                            <input type="text" name="op4" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="op5">Opção 5</label>
                            <input type="text" name="op5" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="grupo_id">Grupo</label>
                            <select name="grupo_id" class="form-control" required>
                                <option value="">Selecione um Grupo</option>
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