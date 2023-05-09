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
            <h1>Novo questionário</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('questionarios.store') }}" method="POST">
                @csrf

                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required maxlength="255">
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>

            </form>
        </div>
    </div>
    @endsection