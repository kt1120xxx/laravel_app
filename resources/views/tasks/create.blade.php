@extends('layouts/original')

@section('content')
    <div class="to-do-wrap mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                New To Do
            </h1>
            <form action="taskCreate" method="post">
                @csrf

                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="todo">
                            todo
                        </label>
                        <input
                            id="todo"
                            name="todo"
                        >
                    </div>

                    <div class="form-group">
                        <label for="status">
                            status
                        </label>
                        <select name="status">
                            <option value=0>未着手</option>
                            <option value=1>進行中</option>
                            <option value=2>完了</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type">
                            type
                        </label>
                        <input
                            id="type"
                            name="type"
                        >
                    </div>

                    <div class="form-group" id="memoForm">
                        <label for="memo">
                            Memo
                        </label>
                        <br>
                        <input
                            class='task-memo'
                            id="memo"
                            name="memo"
                        >
                    </div>
                    
                    <div class="form-group">
                        <label for="dead">
                            dead
                        </label>
                        <input
                            type="date"
                            id="dead"
                            name="dead"
                        >
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">
                            new
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