@extends('app.layouts.basico')

@section('title', 'Produto')
    
@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p>Adicionar Produto</p>
    </div>

    <div class="menu">
        <ul>
            <li>
                <a href="{{ route('produto.index') }}">Voltar</a>                
            </li>
        </ul>
    </div>

    <div class="informacao-pagina"> 
        {{ $msg ?? '' }}
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <form action="{{ route('produto.store') }}" method="post">
                @csrf
                <input type="text" name="nome" placeholder="Nome" value="{{ old('nome') }}" class="borda-preta">
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                <input type="text" name="descricao" placeholder="Descrição" value="{{ old('descricao') }}" class="borda-preta">
                {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

                <input type="text" name="peso" placeholder="Peso" value="{{ old('peso') }}" class="borda-preta">
                {{ $errors->has('peso') ? $errors->first('peso') : '' }}

                <select name="unidade_id" id="unidade_id">
                    <option>-- Selecione a unidade de medida --</option>
                    @foreach ($unidades as $unidade)
                        <option value="{{ $unidade->id }}" {{ old('unidade_id') == $unidade->id ? 'selected' : '' }} >{{ $unidade->descricao }}</option>                        
                    @endforeach
                </select>
                {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
        </div>
    </div>
</div>

@endsection