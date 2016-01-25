@extends('_layouts.default')

@section('content')
    <h4>
        <a href="/">Front Page</a>
    </h4>

    <h1 style="text-align: center; margin-top: 50px;">{{ $page->title }}</h1>
    <hr>
    <div id="date" style="text-align: right;">
        {{ $page->updated_at }}
    </div>
    <div id="content" style="padding: 50px;">
        <p>
            {{ $page->body }}
        </p>
    </div>

    <div id="comments" style="margin-bottom: 100px;">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="new">
            <form action="{{ URL('comment/store') }}" method="POST">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <input name="page_id" type="hidden" value="{{ $page->id }}">
                <div class="form-group">
                    <label>Nickname</label>
                    <input name="nickname" type="text" class="form-control" style="width: 300px;" required="required">
                </div>
                <div class="form-group">
                    <label>E-Mail</label>
                    <input name="email" type="email" class="form-control" style="width: 300px;">
                </div>
                <div class="form-group">
                    <label>Home Page</label>
                    <input name="website" type="text" class="form-control" style="width: 300px;">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" id="newFormContent" class="form-control" rows="10" required="required"></textarea>
                </div>
                <button type="submit" class="btn btn-lg btn-success co-lg-12">Submit</button>
            </form>
        </div>
    </div>

<script>
    function reply(a) {
        var nickname = a.parentNode.parentNode.firstChild.nextSibling.getAttribute('data');
        var textArea = document.getElementById('newFormContent');
        textArea.innerHTML = '@'+nickname+' ';
    }
</script>

    <div class="comments" style="margin-top: 100px;">
        @foreach ($page->hasManyComments as $comment)

            <div class="one" style="border-top: solid 20px #efefef; padding: 5px 20px;">
                <div class="nickname" data="{{ $comment->nickname }}">
                    @if ($comment->website)
                        <a href="{{ $comment->website }}">
                            <h3>{{ $comment->nickname}}</h3>
                        </a>
                    @else
                        <h3>{{ $comment->nickname }}</h3>
                    @endif
                    <h6>{{ $comment->created_at }}</h6>
                </div>
                <div class="content">
                    <p style="padding: 20px;">
                        {{ $comment->content }}
                    </p>
                </div>
                <div class="reply" style="text-align: right; padding: 5px;">
                    <a href="#new" onclick="reply(this);">Reply</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection