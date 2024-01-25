<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$rules = [
			'name' => ['required', 'string'],
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
