<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\CategoryRequest;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
	public function index()
	{
		// $categorys = Category::get();
		// if (!$request->ajax()) return view();
		// return response()->json(['categorys' => $categorys], 200);
		//view

		return view('categories/index');
	}

	public function store(CategoryRequest $request)
	{
		// $category = new Category($request->all());
		// $category->save();
		// if (!$request->ajax()) return back()->with('success', 'category created');
		// return response()->json(['status' => 'category created', 'user' => $category], 201);

		$category = new Category($request->all());
		$category->save();
		return response()->json([], 200);
	}

	public function getAll()
	{
		$categories = Category::query();
		return DataTables::of($categories)->toJson();
	}

	public function show(Category $category)
	{
		// if (!$request->ajax()) return view();
		// return response()->json(['category' => $category], 200);

		return response()->json(['category' => $category], 200);
	}

	public function update(CategoryRequest $request, Category $category)
	{
		$category->update($request->all());
		return response()->json([], 204);
	}

	public function destroy(Category $category)
	{
		// $category->delete();
		// if (!$request->ajax()) return back()->with('success', 'Category deleted');
		// return response()->json([], 204);

		$category->delete();
		return response()->json([], 204);
	}
}
