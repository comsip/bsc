@extends('layouts.app')
@section('content')
<div class="container">
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h2>Editar Perguntas</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('perguntas.update', $pergunta->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" value="{{ old('descricao', $pergunta->descricao) }}" required maxlength="255">
                    @error('descricao')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="op1">Opção 1</label>
                    <input type="text" class="form-control @error('descricao') is-invalid @enderror" id="op1" name="op1" value="{{ old('op1', $pergunta->op1) }}" required maxlength="255">
                    @error('op1')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="op2">Opção 2</label>
                    <input type="text" class="form-control @error('op') is-invalid @enderror" id="op2" name="op2" value="{{ old('op2', $pergunta->op2) }}" required maxlength="255">
                    @error('op')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="op3">Opção 3</label>
                    <input type="text" class="form-control @error('op') is-invalid @enderror" id="op3" name="op3" value="{{ old('op3', $pergunta->op3) }}" required maxlength="255">
                    @error('op3')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="op4">Opção 4</label>
                    <input type="text" class="form-control @error('op') is-invalid @enderror" id="o4" name="op4" value="{{ old('op4', $pergunta->op4) }}" required maxlength="255">
                    @error('op4')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="op5">Opção 5</label>
                    <input type="text" class="form-control @error('op') is-invalid @enderror" id="op5" name="op5" value="{{ old('op5', $pergunta->op5) }}" maxlength="255">
                    @error('op5')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="grupo_id">Grupos</label>
                    <select name="grupo_id" class="form-control" required>
                        <option value="{{ old('grupo_id', $pergunta->grupo_id) }} ">{{ old('$pergunta->grupo->nome', $pergunta->grupo->nome ) }}</option>
                        @foreach ($grupos as $grupo)
                        <option value="{{ $grupo->id }}">{{ $grupo->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center mt-1">
                    <button type="submit" class="btn btn-primary">Salvar</button>

                    <a href="{{ route('perguntas.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    @endsection