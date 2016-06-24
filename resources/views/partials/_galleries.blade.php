@foreach($galleries->chunk(isset($columns) ? $columns : 4) as $i => $gallery)
    <div class="row">
        @foreach($gallery as $j => $item)
            <div class="col-md-{{ isset($columns) ? floor(12 / $columns) : 3 }}">
                <div class="gallery-item">
                    <div class="vcenter">
                        @if(isset($item->opera->first()->thumbnail_path))
                            <a href="{{ action('GalleryController@show', $item->id) }}">
                                <img src="/{{ $item->opera->first()->thumbnail_path }}" alt="">
                            </a>
                        @endif
                        <h5><a href="{{ action('GalleryController@show', $item->id) }}">{{ $item->name }}</a></h5>
                    </div>
                </div>
                @if(Auth::check() and (Auth::user()->atLeastHasRole(config('roles.globalModerator')) or Auth::user()->isOwner($item)))
                    <div class="gallery-operations">
                        @include('partials._galleryOperationsDropdown', ['id' => $i.'-'.$j, 'gallery' => $item])
                    </div>
                    <div>
                        @include('partials._galleryOperationsModal', ['id' => $i.'-'.$j, 'gallery' => $item])
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endforeach