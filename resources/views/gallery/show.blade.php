@extends('layouts.app')

@section('content')
    <div class="col-md-3">
        <h1>{{ $gallery->name }}</h1>
        <p>{{ $gallery->description }}</p>
        @if(Auth::check() and (Auth::user()->isOwner($gallery) or Auth::user()->hasRole('admin')))
            <div class="container">
                <a class="btn btn-primary" href="{{ action('PieceController@create', $gallery->id) }}">Submit Artwork</a>
            </div>
        @endif
    </div>
    <div class="col-md-9">
        <div class="container-fluid">
            @foreach($features->chunk(3) as $featureChunk)
                <div class="row" >
                    @foreach($featureChunk as $feature)
                        <div class="vcenter col-md-4">
                            <div class="">
                                <img src="/{{ $feature->piece->getThumbnail() }}" alt="">
                                <h4><a href="{{ action('PieceController@show', [$feature->gallery->id, $feature->piece->id]) }}">{{ $feature->piece->title }}</a>- {{ $feature->piece->user->name }}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
            {{ $features->render() }}
        </div>
    </div>
@endsection