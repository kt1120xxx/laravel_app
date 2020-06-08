<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Routine;

class RoutinesController extends Controller
{
    public function index()
    {
        $routines = Routine::orderBy('created_at','desc')->paginate(5);
        return view('routines.index', [ "routines" => $routines ]);
    }

    public function create()
    {
        return view('routines.create');
    }

    public function store(Request $request)
    {
        Routine::insert([
            'todo' => $request->todo,
            'week' => $request->week,
            'type' => $request->type,
            'memo' => $request->memo,
            'start' => $request->start,
            'end' => $request->end,
        ]);
        return redirect()->route('routinetop');
    }

    public function searchWeek($searchWeek)
    {
        $routines = Routine::where('week', $searchWeek)->orderBy('created_at','desc')->get();
        return $routines;
    }

    public function show($routine_id)
    {
        $routine = Routine::find($routine_id);
        return view('routines.show',[ "routine" => $routine ]);
    }

    public function edit($routine_id)
    {
        $routine = Routine::findOrFail($routine_id);
        return view('routines.edit',[ "routine" => $routine ]);
    }

    public function update($routine_id, Request $request)
    {
        $routine = Routine::findOrFail($routine_id);

        $routine->week = $request->week;
        $routine->todo = $request->todo;
        $routine->type = $request->type;
        $routine->memo = $request->memo;
        $routine->start = $request->start;
        $routine->end = $request->end;
        $routine->save();
        return redirect()->route('routinetop');
    } 

    public function destroy($routine_id)
    {
        Routine::destroy($routine_id);
        return redirect()->route('routinetop');
    }
}