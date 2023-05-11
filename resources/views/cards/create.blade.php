@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h2>Adicionar Novo Card</h2>
        </div>
        <div class="card-body">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form action="{{ route('cards.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="imagem">Imagem</label>
              <input type="file" name="imagem" class="form-control-file" id="imagem" required>
            </div>
            <div class="form-group">
              <label for="titulo">Título</label>
              <input type="text" name="titulo" class="form-control" id="titulo" required>
            </div>
            <div class="form-group">
              <label for="descricao">Descrição</label>
              <textarea name="descricao" class="form-control" id="descricao" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <label for="classe">Classe</label>
              <input type="text" name="classe" class="form-control" id="classe" required>
            </div>
            <div class="form-group">
              <label for="valor">Valor</label>
              <input type="number" name="valor" class="form-control" id="valor" step="0.01" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Adicionar Card</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection