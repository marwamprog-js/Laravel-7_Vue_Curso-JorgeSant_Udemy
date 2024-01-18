<form action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}" method="post">
@csrf

<select name="produto_id" id="produto_id">
    <option>-- Selecione um produto --</option>
    @foreach ($produtos as $produto)
        <option value="{{ $produto->id }}"
            {{ old('produto_id') == $produto->id ? 'selected' : '' }}>{{ $produto->nome }}
        </option>
    @endforeach
</select>
{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

<input type="number" class="borda-preta" name="quantidade" id="quantidade" value="{{ old('quantidade') ?? '' }}" placeholder="Quantidade">
{{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}

<button type="submit" class="borda-preta">Adicionar</button>
</form>
