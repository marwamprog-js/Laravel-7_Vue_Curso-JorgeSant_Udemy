{{ $slot }}

@if (count($errors) > 0)
    <div class="alert">
        {{ $errors }}
        @foreach ($errors as $e)
           <p>{{ $e->nome }}</p>     
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

    <select name="motivo_contato" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>

        @foreach ($motivo_contatos as $key => $motivo_contato )
            <option value="{{ $key }}" {{ old('motivo_contato') == $key ? 'Selected' : '' }} >{{ $motivo_contato }}</option>
        @endforeach

    </select>
    <br>
    <textarea name="mensagem" class="{{ $classe }}" placeholder="Preencha aqui a sua mensagem">{{ old('mensagem') }}</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>