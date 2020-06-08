@extends('layouts/original')
@section('content')
    <div class="task-wrap mt-4">
        <div>
            <a href="{{ url('/task')}}" class="btn btn-secondary">Home</a>
        </div>
            <table class="tasks-list">
                <tr>
                    <td class="task-list-tilte">dead</td>
                    <td class="task-list-tilte">todo</td>
                    <td class="task-list-tilte">type</td>
                    <td class="task-list-tilte">memo</td>
                    <td class="task-list-tilte">create</td>
                    <td class="task-list-tilte">edit</td>
                </tr>

                @foreach($tasks as $task)
                        <tr>
                            <td class="task-list-body">{{ $task->dead }}</td>
                            <td class="task-list-body">{{ $task->todo }}</td>
                            <td class="task-list-body">{{ $task->type }}</td>
                            @if($task->memo)
                                <td class="task-list-body">
                                    <a href='{{ url("/task/show/$task->id") }}'>...</a>
                                </td>
                            @else
                                <td class="task-list-body"></td>
                            @endif
                            <td class="task-list-body">{{ $task->created_at->format('Y/m/d')}}</td>
                            <td class="task-list-body">
                                <a href='{{ url("/task/show/$task->id") }}'>タスクを戻す</a>
                            </td>
                        </tr>
                @endforeach
            </table>
        <div class="d-flex justify-content-center mb-5">
            {{ $tasks->links() }}
        </div>
    </div>
@endsection