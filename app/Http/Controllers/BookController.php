<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Traits\UploadFile;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\User\BookRequest;
use App\Http\Requests\Book\BookUpdateRequest;

class BookController extends Controller
{
	use UploadFile;
	public function home()
	{
		//view crud
		//$books = Book::get();
		//if (!$request->ajax()) return view();
		//return response()->json(['books' => $books], 200);

		//view of blade
		$books = Book::with('author', 'category', 'file')
			->whereHas('category')
			->where('stock', '>', 0)
			->get();

		return view('index', compact('books'));
	}
	public function index()
	{
		//view crud
		//$books = Book::get();
		//if (!$request->ajax()) return view();
		//return response()->json(['books' => $books], 200);

		//view of blade
		$authors = Author::get();
		$books = Book::with('author', 'category', 'file')->whereHas('category')->get();
		return view('books.index', compact('books', 'authors'));
	}

	public function store(BookRequest $request)
	{
		// $book = new Book($request->all());
		// $book->save();
		// if (!$request->ajax()) return back()->with('success', 'Book created');
		// return response()->json(['status' => 'Book created', 'user' => $book], 201);
		try {
			DB::beginTransaction();
			$book = new Book($request->all());
			$book->save();
			$this->uploadFile($book, $request);
			DB::commit();
			return response()->json([], 200);
		} catch (\Throwable $th) {
			DB::rollback();
			throw $th;
		}
	}

	public function show(Book $book)
	{
		// if (!$request->ajax()) return view();
		// return response()->json(['book' => $book], 200);

		return response()->json(['book' => $book], 200);
	}

	public function update(BookUpdateRequest $request, Book $book)
	{
		// $book->update($request->all());
		// if (!$request->ajax()) return back()->with('success', 'Books updated');
		// return response()->json([], 204);

		try {
			DB::beginTransaction();
			$book->update($request->all());
			$this->uploadFile($book, $request);
			DB::commit();
			return response()->json([], 204);
		} catch (\Throwable $th) {
			DB::rollback();
			throw $th;
		}
	}

	public function destroy(Book $book)
	{
		// $book->delete();
		// if (!$request->ajax()) return back()->with('success', 'Book deleted');
		// return response()->json([], 204);

		$book->delete();
		$this->deleteFile($book);
		return response()->json([], 204);
	}
}
