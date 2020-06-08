<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    protected $fillable = [
        'todo',
        'status',
        'type',
        'memo',
        'dead',
        'deleted_at'
    ];

    public function deadJudge()
    {
        $only_day = substr($this->dead,8,2);
        $task_limit_day = str_replace('0','',$only_day);
        $today = str_replace('0','',date('d'));


        $only_month = substr($this->dead,5,2);
        $task_limit_month = str_replace('0','',$only_month);
        $month = str_replace('0','',date('m'));

        if($task_limit_day==$today && $task_limit_month==$month){
            return true;
        }else{
            return false;
        }
    }

    public function jsonToArray()
    {
        $memo_array = json_decode($this->memo,true);
        return $memo_array;
    }
}
