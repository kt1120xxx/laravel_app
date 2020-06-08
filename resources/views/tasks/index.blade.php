@extends('layouts/original')
@section('content')
    <div class="task-wrap mt-4">
        <span>
            <a href="{{ url('/task/create')}}" class="btn btn-primary">new</a>
        </span>
        <span>
            <a href="{{ url('/task/deleteList')}}" class="btn btn-secondary">DeleteList</a>
        </span>

        <div class="task-status">未着手</div>
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
                    @if($task->status == 0)
                    <?php
                        $task_limit = $task->deadJudge() ? 'task-limit' : '';
                    ?>
                        <tr class="{{$task_limit}}">
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
                                <a href='{{ url("/task/show/$task->id") }}'>続きを読む</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>

            <div class="task-status">進行中</div>
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
                        @if($task->status == 1)
                        <?php
                            $task_limit = $task->deadJudge() ? 'task-limit' : '';
                        ?>
                            <tr class="{{$task_limit}}">
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
                                    <a href='{{ url("/task/show/$task->id") }}'>続きを読む</a>
                                </td>
                            </tr>

                        @endif
                    @endforeach
                </table>
                
            <div class="task-status">完了</div>
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
                        @if($task->status == 2)
                        <?php
                            $task_limit = $task->deadJudge() ? 'task-limit' : '';
                        ?>
                            <tr class="{{$task_limit}}">
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
                                    <a href='{{ url("/task/show/$task->id") }}'>続きを読む</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>

        <div class="d-flex justify-content-center mb-5">
            {{ $tasks->links() }}
        </div>
    </div>
@endsection