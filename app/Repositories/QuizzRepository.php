<?php namespace App\Repositories;

use App\Models\Quizz;
use App\Models\Score;
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
		$quizz->setAttribute('starting_at', new \DateTime($inputs['starting_at']));
		$quizz->setAttribute('ending_at', new \DateTime($inputs['ending_at']));
		$quizz->theme()->associate($theme);
		$quizz->save();
	}

	/**
	 * @param $id
	 * @param $inputs
	 */
	public function update($id, $inputs)
	{
		$theme = Theme::findOrFail($inputs['id_theme']);

		$quizz = Quizz::find($id);
		$quizz->fill($inputs);
		$actif = isset($inputs['actif']) ? true : false;
		$quizz->setAttribute('actif', $actif);
		$quizz->theme()->associate($theme);
		$quizz->save();
	}

	/**
	 * @return mixed
	 */
	public function getActif()
	{
		return Quizz::where('actif', 1)->first();
	}
}