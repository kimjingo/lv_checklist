@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="col-md-12">
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.pages.update', $page) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header"><strong>{{ __('Edit Page') }}</strong> <small></small></div>
                    <div class="card-body">
                        @if(session('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input value="{{ $page->title }}" class="form-control" name="title" type="text" >
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" name="content" rows="5" >{{ $page->content }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit"> Save Page</button>
                    </div>
                </form>
            </div>

            <form action="{{ route('admin.pages.destroy', $page ) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit"
                    onclick="return confirm('Are you sure?');"> Delete</button>

            </form>

    
        </div>
    </div>
</div>
@endsection