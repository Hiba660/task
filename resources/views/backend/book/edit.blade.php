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
                            <h4>Update Books</h4>
                        </div>
                        <a href="{{ route('backend.book.index') }}" class="ms-auto btn btn-primary btn-sm">Back</a>
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('backend.book.update',$books->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $books->title}}">
                                @error('title')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="basic-example">{{ $books->description }}</textarea>
                                @error('title')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cover Image</label>
                                <input type="file" name="cover_image" class="form-control"> <img src="{{asset('backend/book/img/'.$books->cover_image) }}"width="100px" height="100px">
                                @error('title')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ISBN</label>
                                <input type="text" name="isbn" class="form-control" value="{{ $books->isbn}}">
                                @error('title')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Published Date</label>
                                <input type="date" name="published_date" class="form-control" value="{{ $books->published_date}}">
                                @error('title')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" name="price" class="form-control" value="{{ $books->price }}">
                                @error('title')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Number of pages</label>
                                <input type="text" name="number_of_pages" class="form-control" value="{{ $books->number_of_pages }}">
                            @error('title')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    tinymce.init({
    selector: 'textarea#basic-example',
    height: 200,
    menubar: false,
    plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table paste code help wordcount'
    ],
    toolbar: 'undo redo | formatselect | ' +
    'bold italic backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat | help',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
    elementpath:false,
  });
    </script> 
@endsection