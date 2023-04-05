<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;



class FrontendController extends Controller
{
    public function index(){
      
    $book = Book::all();    
    return view('frontend.homepage',compact('book'));
    }

    public function detail(Request $request,$id){
      
        $books = Book::all();
        $book = Book::where('id', $id)->get();
        return view('frontend.bookdetailpage',compact('book','books'));
    }
}
