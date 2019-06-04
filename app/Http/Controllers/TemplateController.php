<?php

namespace App\Http\Controllers;

use App\Task;
use App\Template;
use Validator;
use Session;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::all();
        return view('admin.templates.index', compact("templates"));
    }

    public function create()
    {
        return view('admin.templates.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Template::$validates);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $template = new Template();
            $template->fill($request->all());
            $template->save();
            Session::flash('success', 'Элемент успешно добавлен!');
            return redirect()->route('template.edit', ['id' => $template->id]);
        }
    }

    public function details($id)
    {
        $template = Template::find($id);
        if ($template) {
            return view('admin.templates.details', compact("template"));
        } else {
            Session::flash('error', ' Элемент не существует!');
            return redirect()->back();
        }
    }

    public function calendar($id)
    {
        $template = Template::find($id);
        if ($template) {
            return view('admin.templates.calendar', compact("template"));
        } else {
            Session::flash('error', ' Элемент не существует!');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $template = Template::find($id);
        if ($template) {
            $template->delete();
            Session::flash('error', ' Элемент удален!');
        } else {
            Session::flash('error', ' Элемент не существует!');
        }
        return redirect()->back();
    }


    public function edit($id)
    {
        $template = Template::find($id);
        if (!$template) {
            Session::flash('error', ' Элемент не существует!');
            return redirect()->back();
        }

        return view('admin.templates.edit', compact('template', 'tasks'));
    }

    public function update(Request $request, $id)
    {
        $template = Template::find($id);
        if (!$template) {
            Session::flash('error', ' Элемент не существует!');
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), Template::$validates);

        if ($validator->fails()) {
            Session::flash('error', 'Ошибка!');
            return redirect()->back()->withErrors($validator);
        } else {
            $template->fill($request->all());
            $template->save();
            Session::flash('success', 'Элемент успешно обновлен!');
            return redirect()->back();
        }
    }
}
