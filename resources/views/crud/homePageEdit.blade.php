@extends('layouts.app')

@section('content')
    <div class='container'>
    <form class="form-horizontal" enctype="multipart/form-data" method='post' action='{{ action("HomepageController@editHomePageEdit") }}'>
        <fieldset>
            <input type='hidden' name='_token' value='{{ csrf_token() }}'>

            <!-- Form Name -->
            <legend>Editar página principal</legend>
            <!-- Appended checkbox -->
            <!-- Appended checkbox -->
            @if (count($errors) > 0 )
                <div class='alert alert-danger'>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @elseif ($saved)
                <div class='alert alert-success'>
                    Salvo com sucesso.
                </div>
            @endif
            <h4>Cabeçalho da página</h4>
            <hr>
            <div class="form-group">
                <label class="col-md-4 control-label" for="titulo_principal">Titulo principal</label>
                <div class="col-md-4">
                    <input id="titulo_principal" value="{{ isset($cache->titulo_principal) ? $cache->titulo_principal : '' }}" name="titulo_principal" class="form-control" type="text" placeholder="Titulo principal" required="">
                    <p class="help-block">Titulo principal do Site</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="descricao">Descrição</label>
                <div class="col-md-4">
                    <textarea id="descricao" rows="5" name="descricao" class="form-control" type="text" placeholder="Descrição" required="">{{ isset($cache->descricao) ? $cache->descricao : '' }}</textarea>
                    <p class="help-block">Descrição</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="texto_botao">Texto do botão</label>
                <div class="col-md-4">
                    <input id="texto_botao" value="{{ $cache->texto_botao }}" name="texto_botao" class="form-control" type="text" placeholder="Texto do botão" required="">
                    <p class="help-block">Texto do botão</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="fundo_tela">Fundo do cabeçalho</label>
                <div class="col-md-4">
                    <input id="fundo_tela" accept=".jpg" name="fundo_tela" class="form-control" type="file" placeholder="Fundo dessa parte da tela.">
                    <p class="help-block">Fundo do cabeçalho</p>
                </div>
            </div>

            <h4>Sobre nós</h4>
            <hr>
            <div class="form-group">
                <label class="col-md-4 control-label" for="titulo_sobre_nos">Titulo dessa área</label>
                <div class="col-md-4">
                    <input id="titulo_sobre_nos" value="{{ isset($cache->titulo_sobre_nos) ? $cache->titulo_sobre_nos : '' }}" name="titulo_sobre_nos" class="form-control" type="text" placeholder="Titulo sobre nos" required="">
                    <p class="help-block">Titulo dessa área</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="descricao_sobre_nos">Descrição</label>
                <div class="col-md-4">
                    <textarea id="descricao_sobre_nos" rows="5" name="descricao_sobre_nos" class="form-control" type="text" placeholder="Descrição" required="">{{ isset($cache->descricao_sobre_nos) ? $cache->descricao_sobre_nos : '' }}</textarea>
                    <p class="help-block">Descrição</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="texto_botao_sobre_nos">Texto do botão</label>
                <div class="col-md-4">
                    <input id="texto_botao_sobre_nos" value="{{ isset($cache->texto_botao_sobre_nos) ? $cache->texto_botao_sobre_nos : '' }}" name="texto_botao_sobre_nos" class="form-control" type="text" placeholder="Texto do botão" required="">
                    <p class="help-block">Texto do botão</p>
                </div>
            </div>

            <h4>Promoções</h4>
            <hr>
            <div class="form-group">
                <label class="col-md-4 control-label" for="titulo_promocoes">Titulo promoções</label>
                <div class="col-md-4">
                    <input id="titulo_promocoes" value="{{ isset($cache->titulo_promocoes) ? $cache->titulo_promocoes : '' }}" name="titulo_promocoes" class="form-control" type="text" placeholder="Titulo promoções" required="">
                    <p class="help-block">Titulo(abaixo)</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="texto_botao_promocoes">Texto do botão</label>
                <div class="col-md-4">
                    <input id="texto_botao_promocoes" value="{{ isset($cache->texto_botao_promocoes) ? $cache->texto_botao_promocoes : '' }}" name="texto_botao_promocoes" class="form-control" type="text" placeholder="Texto do botão" required="">
                    <p class="help-block">Texto do botão</p>
                </div>
            </div>

            <h4>Contato</h4>
            <hr>
            <div class="form-group">
                <label class="col-md-4 control-label" for="titulo_contato">Titulo Contato</label>
                <div class="col-md-4">
                    <input id="titulo_contato" value="{{ isset($cache->titulo_contato) ? $cache->titulo_contato : '' }}" name="titulo_contato" class="form-control" type="text" placeholder="Titulo Contato" required="">
                    <p class="help-block">Titulo Contato</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="descricao_contato">Descrição</label>
                <div class="col-md-4">
                    <textarea id="descricao_contato" rows="5" name="descricao_contato" class="form-control" type="text" placeholder="Descrição" required="">{{ isset($cache->descricao_contato) ? $cache->descricao_contato : '' }}</textarea>
                    <p class="help-block">Descrição</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="telefone">Telefone</label>
                <div class="col-md-4">
                    <input id="telefone" value="{{ isset($cache->telefone) ? $cache->telefone : '' }}" name="telefone" class="form-control" type="text" placeholder="Telefone" required="">
                    <p class="help-block">Telefone</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="telefone">Email</label>
                <div class="col-md-4">
                    <input id="email" value="{{ isset($cache->email) ? $cache->email : '' }}" name="email" class="form-control" type="email" placeholder="Email" required="">
                    <p class="help-block">Email</p>
                </div>
            </div>
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit">Confirmar</label>
                <div class="col-md-4">
                    <button id="submit" name="submit" class="btn btn-success form-control">Ok</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
@endsection

@section('scripts')
    <script src="{{ url("/js/edit_home_page.js") }}"></script>
@endsection
