@extends('master')

@section('content')
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title float-left"><i class="fa fa-book"></i> {{$book->title}}</h4>
            <div class="float-right"><i class="fa fa-user-circle"></i> By <strong>{{$book->user->username}}</strong></div>
            <div class="clearfix"></div>
            <p class="card-text">ISBN: {{$book->isbn}}</p>
            <div class="">
                @if(count($book_reviews))
                    <h5><i class="fa fa-comment"></i> Previous Reviews</h5>
                    @foreach($book_reviews as $book_review)
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="card-subtitle">
                                    <div class="float-left"><i class="fa fa-user"></i> By: {{$book_review->user->username}}</div>
                                    <div class="float-right"> Rating: {{$book_review->rating}}</div>
                                    <div class="clearfix"></div>

                                </div>
                                {{$book_review->review}}
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="card bg-secondary">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa fa-plus-circle"></i> Add Review</h5>
                        {!! form($form) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection