@extends('layouts/original')

@section('content')
    <div class="to-do-wrap mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                New To Do
            </h1>
            <form action="routineCreate" method="post">
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
                        <label for="type">
                            type
                        </label>
                        <input
                            id="type"
                            name="type"
                        >
                    </div>

                    <div class="form-group">
                        <label for="week">
                            Day of the week
                        </label>
                        <input
                            id="week"
                            name="week"
                        >
                    </div>

                    <div class="form-group">
                        <label for="memo">
                            Memo
                        </label>
                        <input
                            id="memo"
                            name="memo"
                        >
                    </div>
                    
                    <div class="form-group">
                        <label for="start">
                            start
                        </label>
                        <input
                            id="start"
                            name="start"
                        >
                    </div>

                    <div class="form-group">
                        <label for="end">
                            end
                        </label>
                        <input
                            id="end"
                            name="end"
                        >
                    </div>


                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">
                            new
                        </button>

                        <a class="btn btn-secondary" href="{{ url('/routine') }}">
                            キャンセル
                        </a>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection