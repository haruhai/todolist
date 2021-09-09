<?php

namespace App\Http\Controllers;

use App\Models\Todo;
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
        // $param=[
        //     //'id'=>$request->id,
        //     'content'=>$request->content,
        // ];
        //DB::table('todos')->insert($param);
        $form = $request->all();
        Todo::create($form);
        return redirect('/');
    }
    public function edit(Request $request)
    {
        $todos = Todos::find($request->id);
        return view('edit', ['form' => $todos]);
    }
    public function update(Request $request)
    {
        $this->validate($request, Todos::$rules);
        $form = $request->all();
        unset($form['_token']);
        Todos::where('id', $request->id)->update($form);
        return redirect('/');
    }
}