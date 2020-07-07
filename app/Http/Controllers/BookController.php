<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Http\Resources\Book as BookResourceCollection;

class BookController extends Controller
{
    // public function print($title)
    // {
    // 	return $title;
    // }

    // public function index()
    // {
    //     $books = DB::select('select * from books');
    //     return $books;
    // }

    // public function view($id)
    // {
    //     // $book = DB::select('select * from books where id = :id', ['id' => $id]);
    //     $book = new BookResource(Book::find($id));
    //     return $book;
    // }

    public function top($count)
    {
        $criteria = Book::select('*')
            ->orderBy('views', 'DESC')
            ->limit($count)
            ->get();

        return new BookResourceCollection($criteria);
    }

    public function index()
    {
        $criteria = Book::paginate(4);
        return new BookResourceCollection($criteria);
    }
}
