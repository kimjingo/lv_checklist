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
                <form action="{{ route('admin.checklist_groups.store') }}" method="POST">
                    @csrf
                    <div class="card-header"><strong>{{ __('New Checklist Group') }}</strong> <small></small></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{ old('name') }}" class="form-control" name="name" type="text" placeholder="Enter your name">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit"> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
