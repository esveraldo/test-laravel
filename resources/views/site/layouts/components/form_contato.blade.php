{{ $slot }}
<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    <br>
    @if($errors->has('nome'))
        {{ $errors->first('nome') }}
    @endif
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
    <br>
    @if($errors->has('nome'))
        {{ $errors->first('telefone') }}
    @endif
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
    <br>
    @if($errors->has('nome'))
        {{ $errors->first('email') }}
    @endif
    <select name="motivo_contato_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        
        @foreach($motivo as $m)
            <option value="{{$m->id}}" {{ old('motivo_contato_id') == $m->id ? 'selected': '' }}>{{$m->motivo}}</option>
        @endforeach
    </select>
    @if($errors->has('nome'))
        {{ $errors->first('motivo_contato_id') }}
    @endif
    <br>
    <textarea name="mensagem" class="{{ $classe }}">
    @if(old('mensagem') != '')
        {{ old('mensagem') }}"
    @else
        Preencha aqui a sua mensagem
    @endif
    </textarea>
    <br>
    @if($errors->has('mensagem'))
        {{ $errors->first('mensagem') }}
    @endif
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>



