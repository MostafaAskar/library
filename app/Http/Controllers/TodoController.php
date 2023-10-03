<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TodoController extends Controller
{
    public function index(){
        $alltodos =Todo::select('id' , 'title' , 'desc' , 'status' )
        ->orderBy('id' , 'desc')
        ->paginate(3);
        $completedtodos =Todo::select('id' , 'title' , 'desc' , 'status' )
        ->where('status' , '=', '1')
        ->orderBy('id' , 'desc')
        ->paginate(3);
       
        return  view('todo.index' , [   'todos' =>$alltodos ,
                                        'comletedtodos'=> $completedtodos,
                                    ]
                    );

    }



    public function show(Todo $todo){
        return  view('todo.show' , ['todo' => $todo]);
    }




    public function create(){
        return  view('todo.create');
    }




    public function store(Request $request){
        //validation
        $data = $request->validate([
            'title'  => 'required | string | max:100 ',
            'desc'   => 'required | string',
            'status' => 'required  ',
            'img'    => 'required ',
        ]);
        
        
        //move file 
         $imgname =Storage::putfile("/public/todos", $data['img']);
        
        //  $data['img'] = str_replace('public/' , 'storage/' , $imgname);
        $data['img'] = $imgname;
        //  dd($data);
        Todo::create($data);
        return redirect(url('/todos'));
    }




    // public function completed(){
    //     $todos =Todo::select('id' , 'title' , 'desc' , 'status' )
    //     ->where('status' , '=', '1')
    //     ->paginate(3);
        
    //     return  view('todo.completed' , ['donetodos' =>$todos]);
    // }

    public function done(Todo $todo ,Request $request){
        // $data = $request->validate([
        //     'status' => '1',
        // ]);
        $status= $request->status;
        $status = '1';
        $todo->update(
            [
                'status' => $status ,
            ]
        );
        return  redirect(url('/todos'));
    }



    public function edit(Todo $todo){
        return  view('todo.edit' , ['todo' => $todo]);
    }



    public function update(Todo $todo , Request $request){
         $data=$request->validate([
            'title'  => 'required | string | max:100 ',
            'desc'   => 'required | string',
            'status' => 'required  ',
            'img'    => 'nullable',
        ]);
        if($request->hasFile('img')){
            Storage::delete($todo->img);
            $imgname =Storage::putfile("/public/todos", $data['img']);
            $data['img'] = $imgname;
        }
        
        $todo->update($data);
        return  redirect(url('/todos'));
    }



    public function destroy(Todo $todo){
        Storage::delete($todo->img);
        $todo->delete();
        return  redirect(url('/todos'));
    }



}
