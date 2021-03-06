<div class="col-md-2 comment-avatar">
    <div class="text-center">
        <a href="{{ action('ProfileController@show', $childComment->user->slug) }}">
            <img src="{{ $childComment->user->getAvatar() }}" alt="avatar">
        </a>
    </div>
</div>
<div class="col-md-10">
    <div class="row"><span class="comment-name">{!! $childComment->user->decorateUsername()  !!}</span>
        <i class="fa fa-share"></i> <a href="{{ Request::url() }}#cid:{{ $comment->id }}">{!! $comment->user->decorateUsername()  !!}</a></div>
    <div class="comment-body">
        <div class="comment-date">{{ $childComment->created_at }}</div>
        <p class="comment-text">{{ $childComment->body }}</p>
    </div>
</div>
<div class="container">
    @include('comment._replyChild', ['comment'=>$childComment])
</div>