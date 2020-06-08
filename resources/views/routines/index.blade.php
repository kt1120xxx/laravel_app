@extends('layouts/original')
@section('content')
    <div class="routine-wrap mt-4">
        <span>
            <a href="{{ url('/routine/create')}}" class="routine-btn btn-primary">new</a>
        </span>
        <span>
            <a href="{{ url('/routine')}}" class="routine-btn btn-primary">home</a>
        </span>

            <table class="routines-list">
                <tr>
                    <td class="task-list-tilte">week</td>
                    <td class="task-list-tilte">todo</td>
                    <td class="task-list-tilte">type</td>
                    <td class="task-list-tilte">memo</td>
                    <td class="task-list-tilte">time</td>
                    <td class="task-list-tilte">create</td>
                    <td class="task-list-tilte">edit</td>
                </tr>

                @foreach($routines as $routine)
                    <tr>
                        <td class="routine-list-body">{{ $routine->week }}</td>
                        <td class="routine-list-body">{{ $routine->todo }}</td>
                        <td class="routine-list-body">{{ $routine->type }}</td>
                        <td class="routine-list-body">{{ $routine->memo }}</td>
                        <td class="routine-list-body">{{ $routine->start }}:00~{{ $routine->end }}:00</td>
                        <td class="routine-list-body">{{ $routine->created_at->format('Y/m/d')}}</td>
                        <td class="task-list-body">
                            <a href='{{ url("/routine/show/$routine->id") }}'>続きを読む</a>
                        </td>
                    </tr>
                @endforeach
            </table>

        <div class="d-flex justify-content-center mb-5">
            {{ $routines->links() }}
        </div>
    </div>
@endsection