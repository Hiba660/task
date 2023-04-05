<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;


class BookController extends Controller
{
    public function index(){
        
        $book = Book::all();
        return  view('backend.book.index',compact('book'));
    }

    public function create(){
        
        $user = User::all();
        return  view('backend.book.create',compact('user'));
    }

    public function store(Request $request){

        //valdation of Books Attributes
        $validated = $request->validate([

            'author'           =>  'required',
            'title'            =>  'required',
            'description'      =>  'required',
            'cover_image'      =>  'required|mimes:jpeg,png,jpg,gif',
            'isbn'             =>  'required',
            'published_date'   =>  'required',
            'price'            =>  'required',
            'number_of_pages'  =>  'required'

        ]);

        $book = new Book();
        $book->author           =  $request->author;
        $book->user_id          =  auth()->id();
        $book->title            =  $request->title;
        $book->description      =  $request->description;
        if($request->file('cover_image')){

            $file     = $request->file('cover_image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(Public_Path('backend/book/img'),$filename);
            $book->cover_image = $filename;
        }
        $book->isbn             =  $request->isbn;
        $book->published_date   =  $request->published_date;
        $book->price            =  $request->price;
        $book->number_of_pages  =  $request->number_of_pages;
        $book->save();
       
        return redirect()->route('backend.book.index')->with('message','Books Attributes Created Successfully');
    }


    public function edit(Request $request,$id){

        $books = Book::find($id);
        return view('backend.book.edit',compact('books'));
    }

    public function update(Book $book,Request $request,$id){

        $books = Book::find($id);
        $books->title            =  $request->title;
        $books->description      =  $request->description;
        
        if($request->hasfile('cover_image')){

            $destination = 'file'.$books->cover_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('cover_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move(public_path('backend/book/img'), $filename);
            $books->cover_image = $filename;
        }
        $books->isbn             =  $request->isbn;
        $books->published_date   =  $request->published_date;
        $books->price            =  $request->price;
        $books->number_of_pages  =  $request->number_of_pages;
        $books->save();
      
         return redirect()->route('backend.book.index')->with('message','Books Attributes Updated Successfully');
    }

    public function destroy(Request $request,$id){

        $books = Book::find($id);
        $books->delete();
        return redirect()->route('backend.book.index')->with('message','Data Deleted Successfully');
    }
}
