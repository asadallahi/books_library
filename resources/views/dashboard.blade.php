@extends('master')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-header text-center">Books added by me</h4>

                    <?php
                    $username = $_COOKIE['username'];
                    $user = \App\User::where('username', '=', $username)->first();
                    $books = \App\Book::where('user_id', '=', $user->id)->get();
                    ?>
                    @if(count($books))
                        <div class="list-group">
                            @foreach($books as $book)
                                <a href="{{route('books.show',$book->id)}}"
                                   class="list-group-item list-group-item-action">
                                    <p>title: <strong>{{$book->title}}</strong></p>
                                    <p>isbn: {{$book->isbn}}</p>
                                </a>
                            @endforeach

                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-header text-center">Reviews by me</h4>

                    <?php
                    $username = $_COOKIE['username'];
                    $user = \App\User::where('username', '=', $username)->first();
                    $book_reviews = \App\BookReview::where('user_id', '=', $user->id)->get();
                    ?>
                    @if(count($book_reviews))
                        <div class="list-group">
                            @foreach($book_reviews as $book_review)
                                <a href="{{route('books.show',$book_review->book->id)}}"
                                   class="list-group-item list-group-item-action">
                                    <p>review: <strong>{{$book_review->review}}</strong></p>
                                    <p>rating: {{$book_review->rating}}</p>
                                    <div class="alert alert-secondary">
                                        <div class="float-left">title: {{$book_review->book->title}}</div>
                                        <div class="float-right">isbn: {{$book_review->book->isbn}}</div>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-header text-center">Reviews for my Books</h4>

                    <?php
                    $username = $_COOKIE['username'];
                    $user = \App\User::where('username', '=', $username)->first();
                    $book_reviews = \Illuminate\Support\Facades\DB::select(\Illuminate\Support\Facades\DB::raw('SELECT
                            *
                        FROM
                            book_reviews
                        WHERE
                            book_id IN (
                        SELECT id
                        FROM
                            books
                        WHERE
                            user_id = '.$user->id.'
                            )
                            AND book_reviews.user_id <> '.$user->id));

                    ?>
                    @if(count($book_reviews))
                        <div class="list-group">
                            @foreach($book_reviews as $book_review)
                                <?php
                                $book = \App\Book::find($book_review->book_id);
                                $reviewed_user=\App\User::find($book_review->user_id);



                                ?>
                                <a href="{{route('books.show',$book_review->book_id)}}"
                                   class="list-group-item list-group-item-action">
                                    <p>review: <strong>{{$book_review->review}}</strong></p>
                                    <p>rating: {{$book_review->rating}}</p>
                                    Reviewed by {{$reviewed_user->username}}
                                    <div class="alert alert-secondary">

                                        <div class="float-left">title: {{$book->title}}</div>
                                        <div class="float-right">isbn: {{$book->isbn}} </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    @endif
                </div>
            </div>
        </div>


    </div>

@endsection