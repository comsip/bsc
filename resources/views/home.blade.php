@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <a href="{{ route('questionarios.index') }}" class="btn btn-primary">Questionarios</a>
                    <a href="{{ route('grupos.index') }}" class="btn btn-primary">Grupos</a>
                    <a href="{{ route('perguntas.index') }}" class="btn btn-primary">Perguntas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection