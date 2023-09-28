
<div class="topo">

    <div class="logo">
        <a href=" {{ route('site.index') }} "><img src="{{ asset('img/logo.png') }}"> </a> 
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Principal</a></li>
            <li><a href="{{ route('app.cliente') }}">Clientes</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Fornecedores</a></li>
            <li><a href="{{ route('app.produto') }}">Produtos</a></li>
            <li><a href="{{ route('app.sair') }}">Sair</a></li>
        </ul>
    </div>
</div>