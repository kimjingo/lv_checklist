<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{ $checklist->name }}
                @foreach($completed_tasks as $tt)
                    {{$tt}}
                @endforeach
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach($checklist->tasks->where('user_id', NULL) as $task)
                        <tr>
                            <td>
                                {{ $task->id }}
                                <input type="radio" wire:click="complete_task({{$task->id}})" 
                                    @if( in_array($task->id, $completed_tasks) )  
                                        checked 
                                    @endif
                                />
                            </td>
                            <td wire:click="toggle_task({{$task->id}})" >
                                {{ $task->name }}
                            </td>
                            <td wire:click="toggle_task({{$task->id}})" >
                                @if(in_array($task->id, $open_tasks))
                                    <svg class="c-sidebar-nav-icon">
                                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-caret-top') }}"></use>
                                    </svg>
                                @else
                                    <svg class="c-sidebar-nav-icon">
                                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-caret-bottom') }}"></use>
                                    </svg>
                                @endif
                            </td>
                        </tr>
                        @if(in_array($task->id, $open_tasks))
                            <tr>
                                <td></td>
                                <td conspan="2">
                                    {!! $task->description !!}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
