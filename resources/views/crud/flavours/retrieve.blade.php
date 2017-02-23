@extends('layouts.app')

@section('content')
<div class='container'>
    <script src='/js/flavour.js'></script>
    <form id='form-document-kind-retrieve' class='form-horizontal' action='{{ action("FlavourController@retrieve") }}' method='post'>
        <fieldset>

            <!-- Form Name -->
            <legend>Listar sabores</legend>

            <!-- Search input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Nome do sabor</label>
                <div class="col-md-4">
                <div class="input-group">
                    <input id="name" value="{{ $name }}" name="name" type="search" placeholder="Nome do sabor" class="form-control input-md">
                        <span class="input-group-btn">
                        <a id="search" class='btn btn-small btn-primary' href='#' title='Pesquisar'><span class="glyphicon glyphicon-search"></span></a>
                        <a id="new_flavour" class='btn btn-small btn-success' href='{{ action("FlavourController@add") }}' title='Formulário de inclusão'><span class="glyphicon glyphicon-plus"></span></a>
                        </span>
                    </div>
            </div>
        </fieldset>
        <input type='hidden' name='_token' value='{{{ csrf_token() }}}'>
    </form>
    @if(count($flavour_retrieve) == 0)
        <div class="alert alert-info" role="alert">Nenhum sabor encontrado com a sua pesquisa.</div>
    @else
        <table class='table table-bordered table-hover table-striped'>
            <tr>
                <td>Nome sabor</td>
                <td>Valor</td>
                <td>Valor promocional</td>
                <td>Açoes</td>
            </tr>
            @foreach ($flavour_retrieve as $flavour)
                <tr>
                    <td> {{ $flavour->name }} </td>
                    <td>R$ {{ number_format($flavour->old_value , 2 , ',' , '.' ) }} </td>
                    <td>R$ {{ number_format($flavour->new_value , 2 , ',' , '.' ) }} </td>
                    <td>
                        <a class='btn btn-small btn-primary' href='{{ action("FlavourController@edit", $flavour->id) }}' title='Editar {{ $flavour->name }}'>
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a class='btn btn-small btn-danger' href='#' value='{{ action("FlavourController@delete", $flavour->id) }}' title='Excluir {{ $flavour->name }}'>
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
</div>
@endsection
