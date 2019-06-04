<?php

namespace App\Http\Controllers\Api;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public $time =  ' 00:00:00';
    public function details($id)
    {
        $tasks = Task::where('template_id', $id)->get();
        $data = array();
        foreach ($tasks as $task) {
            $newtask = new MyTask();
            $newtask->id = $task->id;
            $newtask->start_date = $task->numberToDate($task->start_date) . $this->time;
            $newtask->end_date = $task->numberToDate($task->end_date) . $this->time;
            $newtask->text = $task->name;


            if (date('Y-m-d').$this->time >= $newtask->end_date) {
                $newtask->color = 'red';
            } else {
                $newtask->color = 'green';
            }


            $data[] = $newtask;
        }
        $container = new Container();
        $container->data = $data;
        return response()->json($container);
    }
}


class Container
{
    public $data;
}


class MyTask
{
    public $id;
    public $start_date;
    public $end_date;
    public $text;
    public $color;
}