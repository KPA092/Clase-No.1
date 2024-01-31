<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\User\BookRequest;

class BookController extends Controller
{
	public function home(Request $request)
	{
		//view crud
		//$books = Book::get();
		//if (!$request->ajax()) return view();
		//return response()->json(['books' => $books], 200);

		//view of blade
		$books = Book::get();
		return view('index', compact('books'));
	}
	public function index(Request $request)
	{
		//view crud
		//$books = Book::get();
		//if (!$request->ajax()) return view();
		//return response()->json(['books' => $books], 200);

		//view of blade
		$books = Book::with('author', 'category')->get();
		return view('books.index', compact('books'));
	}

	public function create()
	{
		//
	}

	public function store(BookRequest $request)
	{
		$book = new Book($request->all());
		$book->save();
		if (!$request->ajax()) return back()->with('success', 'Book created');
		return response()->json(['status' => 'Book created', 'user' => $book], 201);
	}

	public function show(Request $request, Book $book)
	{
		if (!$request->ajax()) return view();
		return response()->json(['book' => $book], 200);
	}

	public function edit($id)
	{
		//
	}

	public function update(BookRequest $request, Book $book)
	{
		$book->update($request->all());
		if (!$request->ajax()) return back()->with('success', 'Books updated');
		return response()->json([], 204);
	}

	public function destroy(Request $request, Book $book)
	{
		$book->delete();
		if (!$request->ajax()) return back()->with('success', 'Book deleted');
		return response()->json([], 204);
	}
}
