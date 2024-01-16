@extends('app.layouts.basico')

@section('title', 'Produto')
    
@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p>Atualizar Produto</p>
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
            <form action="" method="post">
                @csrf
                <input type="text" name="nome" placeholder="Nome" value="{{ $produto->nome ?? old('nome') }}" class="borda-preta">
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                <input type="text" name="descricao" placeholder="Descrição" value="{{ $produto->descricao ??  old('descricao') }}" class="borda-preta">
                {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

                <input type="text" name="peso" placeholder="Peso" value="{{ $produto->peso ??  old('peso') }}" class="borda-preta">
                {{ $errors->has('peso') ? $errors->first('peso') : '' }}

                <select name="unidade_id" id="unidade_id">
                    <option>-- Selecione a unidade de medida --</option>
                    @foreach ($unidades as $unidade)
                        <option value="{{ $unidade->id }}" {{ $produto->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : '' }} >{{ $unidade->descricao }}</option>                        
                    @endforeach
                </select>
                {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

                <button type="submit" class="borda-preta">Atualizar</button>
            </form>
        </div>
    </div>
</div>

@endsection