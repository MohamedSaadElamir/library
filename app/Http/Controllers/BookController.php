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
        // Validation
        $request->validate([
            'title'=>'required|string|max:100',
            'desc'=>'required|string',
            'img'=>'required|image|mimes:jpg,png'
        ]);

        // move
        $img = $request->file('img');
        $ext = $img->getClientOriginalExtension();
        $name = "book-" . uniqid() . ".$ext";
        $img->move(public_path('uploads/books'), $name);

        $title = $request->title;
        $desc = $request->desc;

        Book::create([
            'title' => $title,
            'desc' => $desc,
            'img' => $name
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
        // Validation
        $request->validate([
            'title'=>'required|string|max:100',
            'desc'=>'required|string',
            'img'=>'nullable|image'
        ]);
        
        $book = Book::findOrFail($id);
        $name = $book->img;

        if($request->hasFile('img'))
        {
            if($name !== null)
            {
                unlink(public_path('uploads/books/') . $name);
            }

            // move
        $img = $request->file('img');
        $ext = $img->getClientOriginalExtension();
        $name = "book-" . uniqid() . ".$ext";
        $img->move(public_path('uploads/books'), $name);

        }
        
        $book->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'img' => $name
        ]);

        return redirect( route('books.show', $id) );
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);

        if($book->img !== null) 
        {
              unlink(public_path('uploads/books/') . $book->img);
        }

        $book->delete();
    
        return redirect( route('books.index') );
    }
}
