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
                    <label for="nome">descricao</label>
                    <input type="text" class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" value="{{ old('descricao', $pergunta->descricao) }}" required maxlength="255">
                    @error('descricao')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="grupo_id">Questionário</label>
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