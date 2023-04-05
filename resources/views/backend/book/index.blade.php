@extends('backend.layout.master')

@section('css')

@endsection

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12 mx-auto col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header d-flex">
                    <div class="card-title">
                        <h4>BOOKS</h4>
                    </div>
                    <a href="{{route('backend.book.create')}}" class="ms-auto btn btn-primary btn-sm">Create Books</a>
                </div>
                <div class="card-body p-3">
                    @if(session('message'))
                    <div class="alert alert-success">
                        <h5>{{ session('message')}}</h5>
                    </div>
                    @endif
                 <div class="table-responsive">
                     <table class="table table-striped shadow">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>ID</th>
                                <th>Cover image</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>ISBN</th>
                                <th>Published date</th>
                                <th>Price</th>
                                <th>Number of pages</th>
                                <th>Action</th>
                            </tr> 
                        </thead>
                        <tbody>
                        
                          @foreach($book as $books)
                            <tr class="text-center">
                                <td class="p-5">{{$books->id}}</td>
                                <td><img src="{{asset('backend/book/img/'.$books->cover_image)}}" width="100px" height="100px"></td>
                                <td class="p-5">{{$books->author}}</td>
                                <td class="p-5">{{$books->title}}</td>
                                <td class="p-5">{!!$books->description!!}</td>
                                <td class="p-5">{{$books->isbn}}</td>
                                <td class="p-5">{{$books->published_date}}</td>
                                <td class="p-5">{{$books->price}}</td>
                                <td class="p-5">{{$books->number_of_pages}}</td>
                              
                               
                                <td class="p-5">
                                    @if($books->user_id == auth()->id())
                                      <a href="{{ route('backend.book.edit',$books->id)}}" class="btn btn-success">Edit</a>
                                      <a href="{{ route('backend.book.delete',$books->id)}}" class="btn btn-danger">Delete</a>
                                    @endif
                                </td> 
                            
                            </tr>
                          @endforeach
                        </tbody>
                     </table>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')

@endsection