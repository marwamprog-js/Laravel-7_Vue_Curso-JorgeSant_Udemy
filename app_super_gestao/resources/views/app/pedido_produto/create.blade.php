@extends('app.layouts.basico')

@section('title', 'Pedido Produto')
    
@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p>Adicionar Produtos ao Pedido</p>
    </div>

    <div class="menu">
        <ul>
            <li>
                <a href="{{ route('pedido.index') }}">Voltar</a>                
            </li>
        </ul>
    </div>

    <div class="informacao-pagina"> 
        <h4>Detalhes do pedido</h4>
        <p>ID do pedido: {{ $pedido->id }}</p>
        <p>Cliente: {{ $pedido->cliente_id }}</p>
        
        {{ $msg ?? '' }}
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
            @endcomponent
        </div>

    </div>
</div>

@endsection