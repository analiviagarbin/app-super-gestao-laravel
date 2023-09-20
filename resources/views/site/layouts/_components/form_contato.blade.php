{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $color }}">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $color }}">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $color }}">
    <br>
    <select name="motivo_contato" class="{{ $color }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1" {{ old('motivo_contato' == 1 ? 'selected' : '')}} >Dúvida</option>
        <option value="2" {{ old('motivo_contato' == 2 ? 'selected' : '')}}>Elogio</option>
        <option value="3" {{ old('motivo_contato' == 3 ? 'selected' : '')}}>Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" placeholder="Descreva sua dúvida aqui!" class="{{ $color }}">{{ (old('mensagem') != '') ? old('mensagem') : '' }}</textarea>
    <br>
    <button type="submit" class="{{ $color }}">ENVIAR</button>
</form>

<div style="position:absolute; top:0px; width:100%; background:red">
    <pre>
    {{ print_r($errors) }}
    </pre>
</div>