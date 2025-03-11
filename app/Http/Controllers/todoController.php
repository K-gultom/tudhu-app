<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class todoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Todo.add');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_todo' => 'required',
            'tanggal' => 'required',
            'todo_desc' => 'required'
        ]);

        $saveTodo = new todo();
        $saveTodo->nama_todo = $request->nama_todo;
        $saveTodo->tanggal = $request->tanggal;
        $saveTodo->todo_desc = $request->todo_desc;
        $saveTodo->user_id = Auth::user()->id;
        $saveTodo->save();
        // dd($saveTodo);
        
        Alert::success(
            'Success', 
            'Success Add Todo'
        );

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $getData = todo::find($id);
        return view('Todo.show-data', compact('getData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $getData = todo::find($id);
        return view('Todo.edit', compact('getData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_todo' => 'required',
            'tanggal' => 'required',
            'todo_desc' => 'required'
        ]);

        $saveTodo = todo::find($id);
        $saveTodo->nama_todo = $request->nama_todo;
        $saveTodo->tanggal = $request->tanggal;
        $saveTodo->todo_desc = $request->todo_desc;
        $saveTodo->user_id = Auth::user()->id;
        $saveTodo->save();
        // dd($saveTodo);

        Alert::warning(
            'Success Edit', 
            'Todo berhasil diperbaharui'
        );

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $getTodo = todo::find($id);
        $getTodo->delete();

        Alert::success('Success', 'Catatan Anda berhasil dihapus');

        return redirect('/home');
    }
}
