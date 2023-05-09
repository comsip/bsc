@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Adicionar Grupo</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('grupos.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="questionario_id">Questionário</label>
                            <select name="questionario_id" class="form-control" required>
                                <option value="">Selecione um questionário</option>
                                @foreach ($questionarios as $questionario)
                                <option value="{{ $questionario->id }}">{{ $questionario->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection