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
            @component('app.produto._components.form_create_edit', ['produto' => $produto, 'unidades' => $unidades])
            @endcomponent
        </div>
    </div>
</div>

@endsection