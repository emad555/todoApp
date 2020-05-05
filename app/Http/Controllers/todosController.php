<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class todosController extends Controller
{
    public function index(){

        $todos = Todo::all();
        
        return view('todos.index', ['todos' => $todos]);
      //return view('todos')->with('todos', $todos);
      
      //return view('todos', compact('todos'));
        
    }

public function welcome(){

    return view('welcome');
}    

public function show($todo){

    return view('todos.show')->with('todos',Todo::find($todo));
}

public function create(){

    return view('todos.create');
}

public function store(Request $request){


    $validatedData = $request->validate([
        'todoTitle' => 'required|max:25|min:6',
        'todoDescription' => 'required',
    ]);
   // return $request->all();
 //   return $request->input('todoTitle');
    //return $request->input('todoDescription');
    $todo = new Todo();
    
    $todo -> title = $request -> todoTitle;
    $todo -> description = $request -> input('todoDescription');
    $todo ->save();

    $request -> session()->flash('success', 'Todo created successfully'); 
    return redirect('/todos');
}

public function edit(Todo $todo){
    return view('todos.edit')->with('todo',$todo);
}



public function update(Request $request ,Todo $todo){
    $validatedData = $request->validate([
        'todoTitle' => 'required|max:25|min:6',
        'todoDescription' => 'required',
    ]);
 
    $todo ->title = $request ->get('todoTitle');
    $todo ->description = $request ->get('todoDescription');
    $todo -> save();
    $request -> session()->flash('update', 'Updated successfully!'); 
    return redirect('/todos');
}

public function destroy(Request $request ,Todo $todo)
{

    $todo -> delete();
    $request -> session()->flash('delete', 'deleted successfully!'); 
    return redirect ('/todos');

}

public function complete(Request $request ,Todo $todo){

    $todo->completed = true;
    $todo->save();
    $request -> session()->flash('complete', 'Completed!');
    return redirect ('/todos');
}
}
