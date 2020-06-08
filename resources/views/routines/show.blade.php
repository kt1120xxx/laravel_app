@extends('layouts/original')
@section('content')
    <div class="task-wrap mt-4">
        <div>
            <a href="{{ url('/routine/create')}}" class="routine-btn btn-primary">new</a>
        </div>

        <table class="tasks-list">
            <tr>
                <td class="task-list-tilte">week</td>
                <td class="task-list-tilte">todo</td>
                <td class="task-list-tilte">type</td>
                <td class="task-list-tilte">memo</td>
                <td class="task-list-tilte">time</td>
                <td class="task-list-tilte">create</td>
            </tr>

            <tr>
                <td class="routine-list-body">{{ $routine->week }}</td>
                <td class="routine-list-body">{{ $routine->todo }}</td>
                <td class="routine-list-body">{{ $routine->type }}</td>
                <td class="routine-list-body">{{ $routine->memo }}</td>
                <td class="routine-list-body">{{ $routine->start }}:00~{{ $routine->end }}:00</td>
                <td class="routine-list-body">{{ $routine->created_at->format('Y/m/d')}}</td>
            </tr>
        </table>
        <a class="btn btn-primary" href='{{ url("/routine/edit/$routine->id") }}'>
            edit
        </a>
        <a class="btn btn-danger" href='{{ url("/routine/destroy/$routine->id") }}'>
            delete
        </a>
        <a class="btn btn-secondary" href="{{ url('/routine') }}">
            キャンセル
        </a>
    </div>
@endsection('content')