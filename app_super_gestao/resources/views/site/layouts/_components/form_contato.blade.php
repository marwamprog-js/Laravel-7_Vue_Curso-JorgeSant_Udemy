{{ $slot }}

@if ($errors->any())
    <div class="alert">
        @foreach ($errors->all() as $e)
           <p>{{ $e }}</p>     
        @endforeach
    </div>
@endif

<form action="{{ route('site.contato.salvar') }}" method="POST">
    @csrf
    <input type="text" name="nome" placeholder="Nome" value="{{ old('nome') }}" class="{{ $classe }}">
    <br>
    <input type="text" name="telefone" placeholder="Telefone" value="{{ old('telefone') }}" class="{{ $classe }}">
    <br>
    <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}" class="{{ $classe }}">
    <br>

    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>

        @foreach ($motivo_contatos as $key => $motivo_contato )
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'Selected' : '' }} >{{ $motivo_contato->motivo_contato }}</option>
        @endforeach

    </select>
    <br>
    <textarea name="mensagem" class="{{ $classe }}" placeholder="Preencha aqui a sua mensagem">{{ old('mensagem') }}</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>