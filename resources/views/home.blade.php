@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Página inicial</div>

                <div class="panel-body">
                    <a class='btn btn-small btn-info' href="{{ action("HomepageController@editHomePageForm") }}">Personalizar página</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
