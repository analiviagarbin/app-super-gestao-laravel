<h3>Fornecedor</h3>

@php 
    //codigo em php
@endphp

{{-- Estruturas no blade --}}

@isset($fornecedores)

    @foreach($fornecedores as $indice => $fornecedor)
        <br />
        Fornecedor: {{ $fornecedor['nome'] }}
        <br />
        Status: {{ $fornecedor['status'] }}
        <br />
        CNPJ: {{ $fornecedor['cnpj'] ?? '' }}
        <br />
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
        <hr>
    @endforeach

@endisset