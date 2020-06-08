@extends('layouts/original')

@section('content')
    <div class="to-do-wrap mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                New English
            </h1>
            <form action="newEnglish" method="post">
                @csrf

                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="english" class="english-label">
                            english
                        </label>
                        <input
                            id="english"
                            name="english"
                        >
                    </div>

                    <div class="form-group">
                        <label for="japanese">
                            japanese
                        </label>
                        <input
                            id="japanese"
                            name="japanese"
                        >
                    </div>
                    <div id="addEnglishForm"></div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">
                            new
                        </button>

                        <a class="btn btn-secondary" href="{{ url('/english_practice') }}">
                            キャンセル
                        </a>
                    </div>
                </fieldset>
            </form>
            <button id="addEnglishButton" class="btn btn-outline-primary">add English</button>
        </div>
    </div>
@endsection