<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodosController extends Controller
{
     public function index()
    {
        $items = DB::table('todos')->get();
        return view('index', ['items' => $items]);
    }
    public function add()
    {
        return view('add');
    }
    public function create(Request $request)
    {
        $form = $request->all();
        Todo::create($form);
        return redirect('/');
    }
    public function update2(Request $request)
    { 
        $form=$request->all();
        Todo::update($form);
        $form->save();
        return redirect('/');
    }
    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
        return redirect('/');
    }
     public function delete(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('delete', ['form' => $todo]);
    }
     public function remove(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }
}