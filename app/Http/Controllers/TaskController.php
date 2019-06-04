<?php

namespace App\Http\Controllers;

use App\Task;
use App\Template;
use Illuminate\Http\Request;
use Session;
use Validator;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('admin.tasks.index', compact("tasks"));
    }

    public function create()
    {
        $templates = Template::all();
        return view('admin.tasks.create', compact('templates'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Task::$validates);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $task = new Task();
            $task->fill($request->all());

            $task->start_date = $task->dateToNumber($request->start_date);
            $task->end_date = $task->dateToNumber($request->end_date);

            if($task->start_date > $task->end_date ){
                return redirect()->back()->withErrors(['start_date' => 'Дата начала не может быть меньше чем дата конца']);
            }

            $task->save();
            Session::flash('success', 'Успешно добавлена!');
            return redirect()->back();
        }
    }


    public function delete($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            Session::flash('success', 'Успешно удалена!');
        } else {
            Session::flash('error', 'Элемент не существует!');
        }
        return redirect()->back();
    }


    public function edit($id)
    {
        $task = Task::find($id);
        $templates = Template::all();
        if (!$task) {
            Session::flash('error', ' Элемент не существует!');
            return redirect()->back();
        }
        return view('admin.tasks.edit', compact('task', 'templates'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if (!$task) {
            Session::flash('error', 'Элемент не существует!');
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), Task::$validates);

        if ($validator->fails()) {
            Session::flash('error', 'Ошибка!');
            return redirect()->back()->withErrors($validator);
        } else {
            $task->fill($request->all());
            $task->start_date = $task->dateToNumber($request->start_date);
            $task->end_date = $task->dateToNumber($request->end_date);
            $task->save();
            Session::flash('error', 'Элемент не существует!');
            return redirect()->back();
        }
    }
}
