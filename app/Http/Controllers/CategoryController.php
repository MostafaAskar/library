<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    

public function index(){
        $categories = Category::select('id' ,'name' ,'img' ,'created_at')
        ->orderBy('id' , 'DESC')
        ->paginate(3);
        // dd($categories);
        return view('categories.index' , ['categories' =>$categories]) ;
    }
    
    
public function show( Category $category ){
        // $category = Category::findorfail($CategoryId);
        $category->load('Books');
        return view('categories.show' , ['category' =>$category ]) ;
    }


public function create(){
        return view('categories.create') ;
    }


public function store(Request $request){
                //validation
            $data = $request->validate([
                    'name'=> 'required | string | max:100 ',
                    'desc'=> 'required | string',
                    'img' => 'required ',
                    //| image | mimes: png , jpg | max :1024
                    // 'img' => 'required | file |mimes: pdf , docs ',
            ]);
                //move uploaded file to public
            $filename =Storage::putfile("/public/categories" , $data['img']);
                // $filename = str_replace('public/' ,'storage/' ,$filename);
                // dd($filename);

                //$data['img]
            $data['img']= str_replace('public/' ,'storage/' ,$filename);

                //store category
            Category::create($data);
            return redirect(url('/categories'));
    }


public function edit(Category $category ){
        // $category = Category::findorfail($category );
        
        return view('categories.edit' , ['category' =>$category]) ;
    }


    public function update(Category $category , Request $request){
        //validation
        $data =  $request->validate([
            'name'=> 'required | string | max:100 ',
            'desc'=> 'required | string',
        ]);

        $category->update($data);
        return redirect(url('/categories'));

    }


public function destroy(Category $category){ 
        // Category::findorfail($category)->delete();

        $category->delete();
        return redirect(url('/categories'));
    }



}
