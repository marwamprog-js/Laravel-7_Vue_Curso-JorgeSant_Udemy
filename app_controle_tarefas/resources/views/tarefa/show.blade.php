@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $tarefa->tarefa }}</div>

                    <div class="card-body">

                        <fieldset disabled>
                            <div class="mb-3">
                                <label for="data_limite_conclusao" class="form-label">Data Limite conclusão</label>
                                <input type="date" class="form-control" value="{{ $tarefa->data_limite_conclusao }}"
                                    id="data_limite_conclusao">
                            </div>
                        </fieldset>

                        <a href="{{ url()->previous() }}" class="btn btn-danger">Voltar</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
