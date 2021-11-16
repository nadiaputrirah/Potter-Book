<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $books = Book::latest()->when(request()->search, function($books) {
            $books = $books->where('title', 'like', '%'. request()->search . '%');
        })->paginate(10);

        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'author'   => 'required',
            'publisher'   => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Book::create($input);

        return redirect()->route('book.index')
        ->with('success','Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('book.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function edit(Book $book)
    {
    return view('book.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
    $this->validate($request, [
        'title'     => 'required',
        'author'   => 'required',
        'publisher'   => 'required'

    ]);
        
    $book = Book::findOrFail($book->id);
        
        $request->validate([
            'title'     => 'required',
            'author'   => 'required',
            'publisher'   => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $book->update($input);

        return redirect()->route('book.index')
        ->with('success','Buku berhasil diupdate');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        Storage::disk('local')->delete('public/books/'.$book->image);
        $book->delete();

        if($book){
            //redirect dengan pesan sukses
            return redirect()->route('book.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('book.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
