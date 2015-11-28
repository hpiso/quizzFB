<?php namespace App\Repositories;

use App\Models\Quizz;
use App\Models\Theme;

class QuizzRepository {

	/**
	 * @param $inputs
     */
	public function store($inputs)
	{
		$theme = Theme::findOrFail($inputs['id_theme']);
		$quizz = new Quizz();
		$quizz->fill($inputs);
		$quizz->theme()->associate($theme);
		$quizz->save();
	}

}