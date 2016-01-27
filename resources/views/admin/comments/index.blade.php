@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Comments</div>

                    <div class="panel-body">

                        <table class="table table-striped">
                            <tr class="row">
                                <th class="col-lg-4">Content</th>
                                <th class="col-lg-2">User</th>
                                <th class="col-lg-4">Page/Article</th>
                            <!--<th class="col-lg-2">Article</th>-->
                                <th class="col-lg-1">Edit</th>
                                <th class="col-lg-1">Delete</th>
                            </tr>
                            @foreach ($comments as $comment)
                                <tr class="row">
                                    <td class="col-lg-6">
                                        {{ $comment->content }}
                                    </td>
                                    <td class="col-lg-2">
                                        @if ($comment->website)
                                            <a href="{{ $comment->website }}">
                                                <h4>{{ $comment->nickname }}</h4>
                                            </a>
                                        @else
                                            <h4>{{ $comment->nickname }}</h4>
                                        @endif
                                        {{ $comment->email }}
                                    </td>
                                    <td class="col-lg-4">
                                        @if ($comment->page_id != 0)
                                        <a href="{{ URL('pages/' . $comment->page_id) }}" target="_blank">
                                            {{ App\Page::find($comment->page_id)->title }}
                                        </a>
                                        @elseif ($comment->article_id != 0)
                                        <a href="{{ URL('articles/' . $comment->article_id) }}" target="_blank">
                                            {{ App\Article::find($comment->article_id)->title }}
                                        </a>
                                        @endif
                                    </td>
                                    <td class="col-lg-1">
                                        <a href="{{ URL('admin/comments/' . $comment->id . '/edit') }}" class="btn btn-success">Edit</a>
                                    </td>
                                    <td class="col-lg-1">
                                        <form action="{{ URL('admin/comments/' . $comment->id) }}" method="POST" style="display: inline;">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection