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
    @if ($errors->has('nome'))
        <span class="input-error">{{ $errors->first('nome') }}</span>
    @endif
    <br>
    <input type="text" name="telefone" placeholder="Telefone" value="{{ old('telefone') }}" class="{{ $classe }}">
    @if ($errors->has('telefone'))
        <span class="input-error">{{ $errors->first('telefone') }}</span>
    @endif
    <br>
    <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}" class="{{ $classe }}">
    @if ($errors->has('email'))
        <span class="input-error">{{ $errors->first('email') }}</span>
    @endif
    <br>

    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>

        @foreach ($motivo_contatos as $key => $motivo_contato )
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'Selected' : '' }} >{{ $motivo_contato->motivo_contato }}</option>
        @endforeach

    </select>
    @if ($errors->has('motivo_contatos_id'))
        <span class="input-error">{{ $errors->first('motivo_contatos_id') }}</span>
    @endif
    <br>
    <textarea name="mensagem" class="{{ $classe }}" placeholder="Preencha aqui a sua mensagem">{{ old('mensagem') }}</textarea>
    <span class="input-error">{{ ($errors->has('mensagem')) ? $errors->first('mensagem') : '' }}</span>    
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>