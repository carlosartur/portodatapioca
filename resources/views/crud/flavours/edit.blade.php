@extends('layouts.app')

@section('content')
<?php $old_offices = old('offices') ? : [];?>
<div class='container'>
    <script src='/js/document_kind.js'></script>
    <form class="form-horizontal" method='post' action='{{ action("FlavourController@save", $Flavour->id) }}'>
        <fieldset>
            <!-- Form Name -->
            <legend>Editar Tipo de documento</legend>
            @if (count($errors) > 0 )
                <div class='alert alert-danger'>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Nome</label>
                <div class="col-md-4">
                    <input id="name" value="{{ $Flavour->name }}" name="name" class="form-control" type="text" placeholder="Nome do sabor" required="">
                    <p class="help-block">Nome do sabor.</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Preço</label>
                <div class="col-md-4">
                    <input id="old_value" value="{{ number_format($Flavour->old_value , 2 , ',' , '.' ) }}" name="old_value" class="form-control" type="text" placeholder="Preço" required="">
                    <p class="help-block">Preço</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Preço promocional</label>
                <div class="col-md-4">
                    <input id="new_value" value="{{ number_format($Flavour->new_value , 2 , ',' , '.' ) }}" name="new_value" class="form-control" type="text" placeholder="Preço promocional">
                    <p class="help-block">Preço promocional.</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit">Confirmar</label>
                <div class="col-md-4">
                    <button id="submit" name="submit" class="btn btn-success control-label">Ok</button>
                </div>
            </div>
        </fieldset>
        <input type='hidden' name='_token' value='{{{ csrf_token() }}}'>
    </form>
</div>
@endsection

@section('scripts')
    <script src="{{ url("/js/flavour.js") }}"></script>
@endsection
