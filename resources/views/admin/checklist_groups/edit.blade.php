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
                <form action="{{ route('admin.checklist_groups.update', $checklistGroup) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header"><strong>{{ __('Edit Checklist Group') }}</strong> <small></small></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{ $checklistGroup->name }}" class="form-control" name="name" type="text" >
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit"> Save</button>
                    </div>
                </form>
            </div>

            <form action="{{ route('admin.checklist_groups.destroy', $checklistGroup ) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit"
                    onclick="return confirm('Are you sure?');"> Delete</button>

            </form>
        </div>
    </div>
</div>
@endsection
