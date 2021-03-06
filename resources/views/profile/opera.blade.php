@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('profile._header', ['user' => $user, 'details' => false])
        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="text-center">
                        Galleries
                    </div>
                </div>
                <div class="panel-body gallery-sidebar">
                    @include('partials._galleries', ['galleries' => $user->galleries, 'columns' => 1])
                </div>
            </div>
        </div>
        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
            @include('partials._opusColumns', ['columns'=>4, 'opera' => $opera])
        </div>
    </div>
    <div class="container">
        <span class="pull-left">{{ $opera->render() }}</span>
    </div>
@endsection