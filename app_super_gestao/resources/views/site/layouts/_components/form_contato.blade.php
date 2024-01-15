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
        <option value="1" {{ old('motivo_contato') == 1 ? 'selected' : '' }}>Dúvida</option>
        <option value="2" {{ old('motivo_contato') == 2 ? 'selected' : '' }}>Elogio</option>
        <option value="3" {{ old('motivo_contato') == 3 ? 'selected' : '' }}>Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class="{{ $classe }}" placeholder="Preencha aqui a sua mensagem">{{ old('mensagem') }}</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>