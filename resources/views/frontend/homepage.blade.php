<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
<section id="nav">
    <div class="logo-image">
            <a href="#"><img src="{{asset('front/img/50.png')}}"></a>
    </div>
    <nav>
       <input type="checkbox" class="checkbox" id="mycheck">
       <label for="mycheck" class="checkbutton">
        <i class="fa fa-bars"></i>
       </label>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">contact</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">contact</a></li>
        </ul>
    </nav>
    <div class="login">
    @if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
        @auth
            <a href="{{ url('/author') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" >Log in</a>

            @if (Route::has('register'))
                
            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 btn btn-primary">Register</a>
            @endif
        @endauth
    </div>
    @endif
</div>
</section>

<section id="image" class="image">
    <img src="{{asset('front/img/book.jpg')}}" alt="center" width="100%" height="600">
</section>

<section>
   <div class="container">
      <div class="row">
        <h1 class="text-center mt-5"> Book List</h1>
         @foreach($book as $books)
            <div class="col-md-4 mt-5">
                <div class="card">
                <a href="{{route('frontend.bookdetailpage',$books->id)}}"><img src="{{asset('backend/book/img/'.$books->cover_image)}}" class="card-img-top" alt="..."  width="100px" height="450px"></a>
                    <div class="card-footer">
                    <a href="{{route('frontend.bookdetailpage',$books->id)}}"><p class="text-center">{{$books->author}}</p></a>
                    </div>
                </div>
            </div>
          @endforeach
       </div>
      </div>
   </div>
</section>
</body>
</html>