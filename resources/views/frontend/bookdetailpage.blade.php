<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front/css/styles.css')}}">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center"> Book Detail page</h1>
                <h6 class="card-subtitle"></h6>
                <div class="row">
                    @foreach ($book as $books)
                 
                    <div class="col-lg-5 col-md-5 col-sm-6">
                        <div class="white-box text-center mt-5"><img src="{{asset('backend/book/img/'.$books->cover_image)}}" class="img-responsive" width="400px" height="400px"></div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6">
                        <h4 class="box-title mt-5">{{$books->title}}</h4>
                        <p>{!!$books->description!!}</p>
                        <h2 class="mt-5">
                            {{$books->price}}
                        </h2>
                        <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                        <button class="btn btn-primary btn-rounded">Buy Now</button>
                       
                    </div>
                    @endforeach
                
                        
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title mt-5">Book Detail</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-product">
                                <tbody>
                                    @foreach ($book as $books)
                                   
                                    <tr>
                                        <td width="390">Author</td>
                                        <td>{{$books->author}}</td>
                                    </tr>
                                    <tr>
                                        <td width="390">ISBN Number</td>
                                        <td>{{$books->isbn}}</td>
                                    </tr>
                                    <tr>
                                        <td>Published Date</td>
                                        <td>{{ $books->published_date}}</td>
                                    </tr>
                                    <tr>
                                        <td>Number Of Pages</td>
                                        <td>{{$books->number_of_pages}}</td>
                                    </tr>
                                 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>