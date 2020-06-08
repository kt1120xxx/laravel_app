@extends('layouts/original')
@section('content')
    <div class="task-wrap mt-4">
        <div>
            <a href="{{ url('/task/create')}}" class="btn btn-primary">new</a>
        </div>
        @if($task->status == 0)
            <div class="task-status">未着手</div>
        @elseif($task->status == 1)
            <div class="task-status">進行中</div>
        @else
            <div class="task-status">完了</div>
        @endif

        <table class="tasks-list">
            <tr>
                <td class="task-list-tilte">dead</td>
                <td class="task-list-tilte">todo</td>
                <td class="task-list-tilte">type</td>
                <td class="task-list-tilte">create</td>
            </tr>

            <tr>
                <td class="task-list-body">{{ $task->dead }}</td>
                <td class="task-list-body">{{ $task->todo }}</td>
                <td class="task-list-body">{{ $task->type }}</td>
                <td class="task-list-body">{{ $task->created_at->format('Y/m/d')}}</td>
            </tr>

        </table>

        <div class="memo-wrap">
            <div class="memo-header">memo</div>
            <ul class="memo-body">
                @if($task->jsonToArray())
                    @foreach($task->jsonToArray() as $memo)
                        <li class="memo-list">{{ $memo }}</li>
                    @endforeach
                @elseif($task->memo)
                    <li class="memo-list">{{ $task->memo }}</li>
                @else
                @endif
            </ul>
        </div>

        <a class="btn btn-primary" href='{{ url("/task/edit/$task->id") }}'>
            edit
        </a>
        @if($task->deleted_at)
            <a class="btn btn-primary" href='{{ url("/task/restoration/$task->id") }}'>
                Restoration
            </a>
        @else
            <a class="btn btn-danger" href='{{ url("/task/destroy/$task->id") }}'>
                Delete
            </a>
        @endif
        <a class="btn btn-secondary" href="{{ url('/task') }}">
            Cancel
        </a>
    </div>
@endsection('content')