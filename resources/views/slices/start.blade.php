<header style="background-image: url('{{ asset('images/header.jpg') }}');">
    <div class="header-content">
        <div class="header-content-inner">
            <h1 id="homeHeading">{{ $cache->titulo_principal }}</h1>
            <hr>
            <p>{{ $cache->descricao }}</p>
            <a href="#about" class="btn btn-primary btn-xl page-scroll">{{ $cache->texto_botao }}</a>
        </div>
    </div>
</header>
