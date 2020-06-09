<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnglishPractice;
use Carbon\Carbon;

class EnglishPracticesController extends Controller
{
    public function index()
    {
        return view('english_practices.index');
    }

    public function list()
    {
        $english = EnglishPractice::whereNull('deleted_at')->inRandomOrder()->take(30)->get();
        return $english;
    }

    public function cerruntList()
    {
        $english = EnglishPractice::whereNull('deleted_at')->get();
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $current_english = [];
        foreach($english as $item){
            if(substr($item->created_at,0,10) == substr($today,0,10)||substr($item->created_at,0,10) == substr($yesterday,0,10)){
                array_push($current_english,$item);
            }
        }
        return $current_english;
    }

    public function priorityList($priority)
    {
        if($priority == 'High'){
            $priority_num = 1;
        }elseif($priority == 'Middle'){
            $priority_num = 2;
        }elseif($priority == 'Low'){
            $priority_num = 3;
        }else{
            $priority_num = 0;
            $priority_english = EnglishPractice::whereNull('deleted_at')->get();
        }

        $priority_english = EnglishPractice::whereNull('deleted_at')->where('priority',$priority_num)->get();
        return $priority_english;
    }

    public function complete($id)
    {
        $complete = EnglishPractice::find($id);
        $complete->deleted_at = Carbon::now();
        $complete->save();
    }

    public function completeList()
    {
        $completeList = EnglishPractice::whereNotNull('deleted_at')->get();
        return $completeList;
    }

    public function returnItem($id)
    {
        $complete = EnglishPractice::find($id);
        $complete->deleted_at = null;
        $complete->save();
    }

    public function create()
    {
        return view('english_practices.create');
    }

    public function store(Request $request)
    {
        $word_array = [];
        foreach($request->request as $key => $param){
            if(strpos($key,'english')!== false||strpos($key,'japanese')!== false||strpos($key,'priorty')!== false){
                array_push($word_array,$param);
            }
        }
        foreach($word_array as $key => $word){

            if($key==0){
                $english = $word;
            }elseif($key==1){
                $japanese = $word;
                EnglishPractice::insert([
                    'english' => $english,
                    'japanese' => $japanese,
                    'priority' => $word_array[2],
                ]);    
            }
        }
        return redirect()->route('english_practicetop');
    }
}