<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->paginate(3);
        
        return view('books/index', compact('books'));
    }

    public function show($id)
    {
        // Book::where('id', '=', $id)->first();  --> another syntax for the next line
        $book = Book::findOrFail($id);
            
        return view('books/show', compact('book'));
    }

    public function create()
    {
        return view('books/create');
    }

    public function store(Request $request)
    {
        $title = $request->title;
        $desc = $request->desc;

        Book::create([
            'title' => $title,
            'desc' => $desc
        ]);

        return redirect( route('books.index') );
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books/edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        Book::findOrFail($id)->update([
            'title' => $request->title,
            'desc' => $request->desc
        ]);

        return redirect( route('books.show', $id) );
    }

    public function delete($id)
    {
        Book::findOrFail($id)->delete();
        return redirect( route('books.index') );
    }
}
