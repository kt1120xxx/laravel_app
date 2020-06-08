@extends('layouts/original')

@section('content')
    <div class="to-do-wrap mt-4">
        <div class="border p-4">
            <form method="POST" action="{{ route('task.update', ['task' => $task]) }}">
                @csrf
                @method('PUT')

                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="todo">
                            todo
                        </label>
                        <input
                            id="todo"
                            name="todo"
                            value="{{ $task->todo }}"
                        >
                    </div>

                    <?php
                        if($task->status == 0){
                            $before = 'selected';
                            $now = '';
                            $after = '';
                        }elseif($task->status == 1){
                            $now = 'selected';
                            $before = '';
                            $after = '';
                        }else{
                            $after = 'selected';
                            $before = '';
                            $now = '';
                        }
                    ?>
                    <div class="form-group">
                        <label for="status">
                            status
                        </label>
                        <select name="status">
                            <option value=0 {{ $before }}>未着手</option>
                            <option value=1 {{ $now }}>進行中</option>
                            <option value=2 {{ $after }}>完了</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type">
                            type
                        </label>
                        <input
                            id="type"
                            name="type"
                            value="{{ $task->type }}"
                        >
                    </div>

                    <div class="form-group" id="memoForm">
                        <label for="memo">
                            Memo
                        </label>
                        @if($task->jsonToArray())
                            @foreach($task->jsonToArray() as $key => $memo)
                            <br>
                            <input
                                    class='task-memo'
                                    id="memo"
                                    name="memo{{ $key }}"
                                    value="{{ $memo }}"
                                >
                            @endforeach
                        @else
                            <br>
                            <input
                                    class='task-memo'
                                    id="memo"
                                    name="memo"
                                    value="{{ $task->memo }}"
                                >
                        @endif

                    </div>
                    
                    <div class="form-group">
                        <label for="dead">
                            dead
                        </label>
                        <input
                            type="date"
                            id="dead"
                            name="dead"
                            value="{{ $task->dead }}"
                        >
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">
                            edit
                        </button>

                        <a class="btn btn-secondary" href="{{ url('/task') }}">
                            キャンセル
                        </a>
                    </div>
                </fieldset>
            </form>
            <button id="addForm" class="btn btn-outline-primary">add memo</button>
        </div>
    </div>
@endsection