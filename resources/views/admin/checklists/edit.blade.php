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
                <form action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header"><strong>{{ __('Edit Checklist') }}</strong> <small></small></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{ $checklist->name }}" class="form-control" name="name" type="text" >
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit"> Save</button>
                    </div>
                </form>
            </div>

            <form action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist] ) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit"
                    onclick="return confirm('Are you sure?');"> Delete</button>

            </form>

            <hr />

            <h2>{{ __('List of Task') }}</h2>
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> {{ __('List of Task') }}</div>
                    <div class="card-body">
                        @livewire('tasks-table', ['checklist' => $checklist])
                        <!-- <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul> -->
                    </div>
                </div>
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
                <form action="{{ route('admin.checklists.tasks.store', [$checklist]) }}" method="POST">
                    @csrf
                    <div class="card-header"><strong>{{ __('New Task') }}</strong> <small></small></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{ old('name') }}" class="form-control" name="name" type="text" placeholder="{{ __('Task name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea class="form-control" name="description" row="5">{{ old('description') }}</textarea>
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
