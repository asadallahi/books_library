<?php

namespace App\Http\Controllers;


use App\Book;
use App\BookReview;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class BooksController extends Controller {
    use FormBuilderTrait;

    public function __construct()
    {
        $this->middleware('authCheck');
    }

    public function index()
    {

        $books = Book::with('user')->get();


        return view('books.index', compact('books'));
    }

    public function create()
    {
        $formOptions = [
            'url'    => route('books.store'),
            'method' => 'POST'
        ];

        $form = $this->plain($formOptions)
            ->add('title', 'text', [
                'label' => 'Book Title',
                'rules' => 'required|min:5',
            ])
            ->add('isbn', 'text', [
                'label' => 'Book ISBN',
                'rules' => 'required|min:5',
            ])
            ->add('submit', 'submit', ['label' => 'Save Book']);

        return view('books.create', compact('form'));

    }

    public function store(Request $request)
    {
        $username = $_COOKIE['username'];
        $user = User::where('username', '=', $username)->first();
        if ($user)
        {

            $duplicate_book = Book::where('isbn', $request->isbn)->first();
            if ($duplicate_book)
            {
                Session::flash('error', "Duplicate ISBN!");

                return Redirect::back();
            }


            $book = new Book();
            $book->title = $request->title;
            $book->isbn = $request->isbn;
            $book->user_id = $user->id;


            if ($book->save())
            {
                Session::flash('success', "Book Saved!");

                return redirect('/books');
            }
        }

        Session::flash('error', "Book NOT Saved!");

        return redirect('/books');

    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        $book_reviews = BookReview::where('book_id', '=', $book->id)->with('user')->get();


        $formOptions = [
            'url'    => url('books.add_review'),
            'method' => 'POST'
        ];

        $form = $this->plain($formOptions)
            ->add('book_id', 'hidden', ['value' => $book->id])
            ->add('review', 'textarea', ['label' => 'Review'])
            ->add('rating', 'select', [
                'label'       => 'Rating',
                'choices'     => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                ],
                'empty_value' => '=== Select Rating ==='
            ])
            ->add('submit', 'submit', ['label' => 'Save Review']);

        return view('books.show', compact('book', 'form', 'book_reviews'));
    }

    public function addReview(Request $request)
    {
        $username = $_COOKIE['username'];
        $user = User::where('username', '=', $username)->first();
        if ($user)
        {
            $book_review = new BookReview();

            $book_review->user_id = $user->id;
            $book_review->book_id = $request->book_id;
            $book_review->review = $request->review;
            $book_review->rating = $request->rating;


            if ($book_review->save())
            {
                Session::flash('success', "Book Review Saved!");

                return Redirect::back();
            }
        }

        Session::flash('error', "Book Review NOT Saved!");

        return Redirect::back();
    }
}
