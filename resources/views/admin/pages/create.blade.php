@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Page</div>

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

                    <form action="{{ URL('admin/pages') }}" method="POST">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input name="title" type="text" class="form-control" required="required">
                        <br>
                        <textarea name="body" rows="10" class="form-control" required="required"></textarea>
                        <br>
                        <button class="btn btn-lg btn-info">Add Page</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection