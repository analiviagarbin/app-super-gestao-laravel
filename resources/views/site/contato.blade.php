@extends('site.layouts.basic')

@section('titulo', $titulo)

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Entre em contato conosco</h1>
    </div>

    <div class="informacao-pagina">
        <div class="contato-principal">
            <form>
                <input type="text" placeholder="Nome" class="borda-preta">
                <br>
                <input type="text" placeholder="Telefone" class="borda-preta">
                <br>
                <input type="text" placeholder="E-mail" class="borda-preta">
                <br>
                <select class="borda-preta">
                    <option value="">Qual o motivo do contato?</option>
                    <option value="">Dúvida</option>
                    <option value="">Elogio</option>
                    <option value="">Reclamação</option>
                </select>
                <br>
                <textarea class="borda-preta">Preencha aqui a sua mensagem</textarea>
                <br>
                <button type="submit" class="borda-preta">ENVIAR</button>
            </form>
        </div>
    </div>  
</div>

@include('site.layouts._partials.rodape')

@endsection