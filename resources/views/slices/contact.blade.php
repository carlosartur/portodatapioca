<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">{{ $cache->titulo_contato }}</h2>
                <hr class="primary">
                <p>{{ $cache->descricao_contato }}</p>
            </div>
            <div class="col-lg-4 col-lg-offset-2 text-center">
                <i class="fa fa-phone fa-3x sr-contact"></i>
                <p>{{ $cache->telefone }}</p>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                <p><a href="mailto:{{ $cache->email }}">{{ $cache->email }}</a></p>
            </div>
        </div>
    </div>
</section>
