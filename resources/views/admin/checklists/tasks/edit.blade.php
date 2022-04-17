@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="col-md-12">
            <div class="card">
                @if ($errors->storetask->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->storetask->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.checklists.tasks.update', [$checklist, $task]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header"><strong>{{ __('Edit Task : ') }}{{ $checklist->name }}</strong> <small></small></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{ $task->name }}" class="form-control" name="name" type="text" >
                                </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea class="form-control" name="description" row="5" id="task-textarea">{{ $task->description }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit"> Save</button>
                    </div>
                </form>
            </div>

            <form action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task] ) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit"
                    onclick="return confirm('Are you sure?');"> Delete</button>

            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
    @include('admin.ckeditor')
@endsection