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
		$actif = isset($inputs['actif']) ? true : false;
		$quizz->setAttribute('actif', $actif);
		$quizz->theme()->associate($theme);
		$quizz->save();
	}

}