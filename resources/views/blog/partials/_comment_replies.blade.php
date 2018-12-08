@foreach($comments as $comment)
    <div class="display-comment">
        @guest
            <hr>
        @else
            @if(!($comment->parent_id))
            <form method="POST" action="{{ route('reply.add') }}">
                {{csrf_field()}}
                <div class="input-group">
                        <input type="text" name="comment_body" class="form-control" />
                        <input type="hidden" name="article_id" value="{{ $article_id }}" />
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                        <span class="input-group-btn">
                            <button class="btn btn-success btn-lg"  value="Reply" type="submit" >Ответить <i class="fa fa-comments-o" aria-hidden="true"></i></button>
                        </span>
                    </div>
                </form>
            @endif
        @endguest
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="comment-author">
                    <img src="{{ $comment->user->avatar}}" class="avatar" height="75" width="75">
                    <cite class="fn">
                        <a href="{{route('otherProfile', $user->id)}}">{{ $comment->user->name }}</a>
                    </cite>
                </div>
                <div class="comment-meta commentmetadata">
                    <div class="intro">
                        <div class="commentDate">
                            {{ $comment->created_at->format('d.m.Y в G:i') }}
                        </div>
                    </div>
                    <div class="comment-body">
                        <p>{{ $comment->body }}</p>
                    </div>
                    <a href="" id="reply"></a>
                </div>
            </div>
        </div>
        @include('blog.partials._comment_replies', ['comments' => $comment->replies])
    </div>
@endforeach