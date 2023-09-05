<h3>Fornecedor</h3>

@php 
    //codigo em php
    //condicional ternário
    //if($statusF=='N') ? 'Está inativo.' : 'Esta ativo.'
@endphp

{{-- Estruturas no blade --}}

{{-- If --}}
@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados.</h3>
@elseif(count($fornecedores)>10)
    <h3>Existem vários fornecedores cadastrados.</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados.</h3>
@endif

{{-- Isset (verifica se a variavel está definida) --}}
@isset($fornecedores)

    Fornecedor: {{ $nomeF = $fornecedores[0]['nome'] }}
    <br />
    Status: {{ $statusF = $fornecedores[0]['status']}}

    {{-- Unless (contrário do if) --}}
    @Unless($statusF=='S')
        <h3>O fornecedor de nome {{ $nomeF }} está inativo.</h3>
    @endif

@endisset

{{-- empty (valores vazios) --}}
{{-- default '??' ---}}