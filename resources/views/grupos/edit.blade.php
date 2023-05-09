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
            <h2>Editar Grupos</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('grupos.update', $grupo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $grupo->nome) }}" required maxlength="255">
                    @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="questionario_id">Questionário</label>
                    <select name="questionario_id" class="form-control" required>
                        <option value="{{ old('questionario_id', $grupo->questionario_id) }} ">{{ old('$grupo->questionario->nome', $grupo->questionario->nome ) }}</option>
                        @foreach ($questionarios as $questionario)
                        <option value="{{ $questionario->id }}">{{ $questionario->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center mt-1">
                    <button type="submit" class="btn btn-primary">Salvar</button>

                    <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    @endsection