<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        //

        $publisher = publisher::all();
        $author = Author::all();
        $Catalog = Catalog::all();
        return view(
            'admin.books.index',
            compact('publisher', 'author', 'Catalog')
        );
    }

    public function api()
    {
        $books = book::all();

        // return $books;

        //  $authors = Author::all();
        $datatables = dataTables()
            ->of($books)
            ->addIndexColumn();

        return $datatables->make(true);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        // dd($request->all());
        // $books = new book();
        // $books->isbn = $request->isbn;
        // $books->title = $request->title;
        // $books->year = $request->year;
        // $books->qty = $request->qty;
        // $books->publisher_id = $request->publisher_id;
        // $books->author_id = $request->author_id;
        // $books->catalog_id = $request->catalog_id;
        // $books->price = $request->price;
        // $books->save();

        // return $books;

        book::create($request->all())->get();

        return redirect('books');
    }

    public function show(Book $book)
    {
        //
    }

    public function edit(Book $book)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
        //dd($request->all());
        $books = book::find($id);
        $books->isbn = $request->isbn;
        $books->title = $request->title;
        $books->year = $request->year;
        $books->qty = $request->qty;
        $books->publisher_id = $request->publisher_id;
        $books->author_id = $request->author_id;
        $books->catalog_id = $request->catalog_id;
        $books->price = $request->price;
        $books->save();
        return redirect('books');
    }

    public function destroy($id)
    {
        //

        $books = book::find($id);
        $books->delete();
        return redirect('books');
    }
}
