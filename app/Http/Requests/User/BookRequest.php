<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$rules = [
			'title' => ['required', 'string'],
			'stock' => ['required', 'numeric'],
			'category_id' => ['required', 'numeric'],
			'author_id' => ['required', 'numeric'],
			'description' => ['required', 'string'],
		];

		return $rules;
	}

	public function messages()
	{
		return [
			'name.required' => 'El nombre es requerido',
			'name.string' => 'El nombre debe de ser valido',
		];
	}
}
