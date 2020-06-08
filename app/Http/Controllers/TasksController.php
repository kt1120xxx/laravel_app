<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::whereNull('deleted_at')->orderBy('created_at','desc')->paginate(7);
        return view('tasks.index', [ "tasks" => $tasks ]);
    }

    public function deleteList()
    {
        $tasks = Task::whereNotNull('deleted_at')->orderBy('created_at','desc')->paginate(7);
        return view('tasks.deleteList', [ "tasks" => $tasks ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $memo_array = [];
        foreach($request->request as $key => $param){
            if(strpos($key,'memo')!== false){
                array_push($memo_array,$param);
            }
        }

        Task::insert([
            'todo' => $request->todo,
            'status' => $request->status,
            'type' => $request->type,
            'memo' => json_encode($memo_array),
            'dead' => $request->dead,
        ]);
        return redirect()->route('tasktop');
    }

    public function show($task_id)
    {
        $task = Task::find($task_id);
        return view('tasks.show',[ "task" => $task ]);
    }

    public function edit($task_id)
    {
        $task = Task::findOrFail($task_id);
        return view('tasks.edit',[ "task" => $task ]);
    }

    public function update($task_id, Request $request)
    {
        $memo_array = [];
        foreach($request->request as $key => $param){
            if(strpos($key,'memo')!== false){
                array_push($memo_array,$param);
            }
        }
    
        $task = Task::findOrFail($task_id);
        $task->todo = $request->todo;
        $task->status = $request->status;
        $task->type = $request->type;
        $task->memo = json_encode($memo_array);
        $task->dead = $request->dead;
        $task->save();
        return redirect()->route('tasktop');
    } 

    public function destroy($task_id)
    {
        $now = Carbon::now();
        $task = Task::find($task_id);
        $task->deleted_at = $now;
        $task->save();
        return redirect()->route('tasktop');
    }

    public function restoration($task_id)
    {
        $task = Task::find($task_id);
        $task->deleted_at = null;
        $task->save();
        return redirect()->route('tasktop');
    }
}
