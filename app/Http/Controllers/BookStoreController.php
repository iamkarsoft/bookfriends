<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookStoreController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'status' => 'required'
        ]);

        $book = Book::create($request->only('title', 'author'));

        $request->user()->books()->attach($book, [
            'status' => $request->status
        ]);

        return redirect('/');
    }
}
