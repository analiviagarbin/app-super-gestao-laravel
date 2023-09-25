@extends('site.layouts.basic')

@section('titulo', $titulo)

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Entre em contato conosco</h1>
    </div>

    <div class="informacao-pagina">
        <div class="contato-principal">
            @component('site.layouts._components.form_contato', ['color' => 'borda-preta', 'motivo_contatos' => $motivo_contatos])
            <!-- CODIFICAÇÃO HTML A MAIS -->
            <p>A nossa equipe analisará a sua mensagem e retornaremos o mais brevemente possível.</p>
            <p>Nosso tempo médio de resposta é de 48h.</p>
            @endcomponent
        </div>
    </div>  
</div>

@include('site.layouts._partials.rodape')

@endsection