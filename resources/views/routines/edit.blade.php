@extends('layouts/layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <form method="POST" action="{{ route('routine.update', ['routine' => $routine]) }}">
                @csrf
                @method('PUT')

                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="week">
                            week
                        </label>
                        <input
                            id="week"
                            name="week"
                            value="{{ $routine->week }}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="todo">
                            todo
                        </label>
                        <input
                            id="todo"
                            name="todo"
                            value="{{ $routine->todo }}"
                        >
                    </div>

                    <div class="form-group">
                        <label for="type">
                            type
                        </label>
                        <input
                            id="type"
                            name="type"
                            value="{{ $routine->type }}"
                        >
                    </div>

                    <div class="form-group">
                        <label for="start">
                            start
                        </label>
                        <input
                            id="start"
                            name="start"
                            value="{{ $routine->start }}"
                        >
                    </div>
                    
                    <div class="form-group">
                        <label for="end">
                            end
                        </label>
                        <input
                            id="end"
                            name="end"
                            value="{{ $routine->end }}"
                        >
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">
                            edit
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