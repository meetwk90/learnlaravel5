@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Comment</div>

                    <div class="panel-body">
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

                        <form action="{{ URL('admin/comments/' . $comment->id) }}" method="POST">
                            <input name="_method" type="hidden" value="PUT">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <input name="page_id" type="hidden" value="{{ $comment->page_id }}">
                            Nickname: <input name="nickname" type="text" class="form-control" required="required" value="{{ $comment->nickname }}">
                            <br>
                            Email:
                            <input name="email" type="text" class="form-control" required="required" value="{{ $comment->email }}">
                            <br>
                            Website:
                            <input name="website" type="text" class="form-control" required="required" value="{{ $comment->website }}">
                            <br>
                            Content:
                            <textarea name="content" rows="10" class="form-control" required="required">{{ $comment->content }}</textarea>
                            <br>
                            <button type="submit" class="btn btn-lg btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection