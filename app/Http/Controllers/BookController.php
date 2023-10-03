<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{public function index(){
    $books = Book::select('id' ,'name' ,'img')
    ->orderBy('id' , 'DESC')
    ->paginate(3);
    // dd($books);
    $books->load('category');
    return view('books.index' , ['books' =>$books]) ;
}


public function show( Book $Book ){
    // $Book = Book::findorfail($BookId);
    $Book->load('category');
    return view('books.show' , ['Book' =>$Book ]) ;
}


public function create(){
    $categories = Category::select('name' , 'id')->get();
    return view ('books.create')->with(
        [
            'categories' => $categories ,
        ]
    ) ;
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
        $data['user_id'] =auth()->user()->id;
        $data['category_id'] =$request->category_id;
            //move uploaded file to public
        $filename =Storage::putfile("/public/books" , $data['img']);
            // $filename = str_replace('public/' ,'storage/' ,$filename);
            // dd($filename);

            //$data['img]
        $data['img']= str_replace('public/' ,'storage/' ,$filename);

            //store Book
        Book::create($data);
        return redirect(url('/books'));
}


public function edit(Book $Book ){
    $categories = Category::select('name' , 'id')->get();

    // $Book = Book::findorfail($Book );
    
    return view('books.edit' , 
    [
        'Book' =>$Book,
        'categories' =>$categories,
    
    ]) ;
}


public function update(Book $Book , Request $request){
    //validation
    $data =  $request->validate([
        'name'=> 'required | string | max:100 ',
        'desc'=> 'required | string',
        'img' => 'nullable| image',
        'category_id' => 'required | exists :categories ,id ',
    ]);

    $Book->update($data);
    return redirect(url('/books'));

}


public function destroy(Book $Book){ 
    // Book::findorfail($Book)->delete();

    $Book->delete();
    return redirect(url('/books'));
}



}