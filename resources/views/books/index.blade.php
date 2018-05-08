@extends('master')

@section('content')
    <a class="btn btn-success" href="{{url('books/create')}}"><i class="fa fa-plus-circle"></i> Add new Book</a>
    @if(!count($books))
        <div class="alert alert-danger text-center mt-4" role="alert">
            There is no Books!
        </div>

    @else
        <div class="row mt-4">
            @foreach( $books as $book)
                <div class="col-sm-3 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-book"></i> {{$book->title}}</h5>
                            <p class="card-text">ISBN: {{$book->isbn}}</p>
                            <div class="float-left">
                                <a href="{{url('books').'/'.$book->id}}" class="btn btn-primary">Reviews</a>
                            </div>
                            <div class="float-right"><i class="fa fa-user"></i> By <strong>{{$book->user->username}}</strong></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection