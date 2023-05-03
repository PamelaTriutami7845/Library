<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        //$authors = Author::all();
        //return view('admin.Author.index', compact('authors'));
        return view('admin.Author.index');
    }

    public function api()
    {
        $authors = Author::all();
        $datatables = dataTables()
            ->of($authors)
            ->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //isikan validasi

        Author::create($request->all())->get();

        return redirect('authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $authors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $authors)
    {
        //
        //return view('admin.Catalog.edit', compact('catalog'));
        // $author = update($request->all());

        // return redirect('Author');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $authors = Author::find($id);
        $authors->name = $request->name;
        $authors->email = $request->email;
        $authors->phone_number = $request->phone_number;
        $authors->address = $request->address;
        $authors->save();
        return redirect('authors');
        // return redirect('authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $catalog->delete();
        $authors = Author::find($id);
        $authors->delete();
        return redirect('authors');
    }
}
