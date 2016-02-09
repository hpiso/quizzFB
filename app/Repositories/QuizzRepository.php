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

	public function checkAndStore($quizz, $answer, $question)
	{

		//Todo changer par le vrai id facebook
		$idFb = 999;

		$score = new Score();
		$score->setAttribute('fb_id', $idFb);
		$score->quizz()->associate($quizz);
		$score->question()->associate($question);
		$score->answer()->associate($answer);

		if ($answer->correct) {
			$correct = true;
		} else {
			$correct = false;
		}

		$score->setAttribute('correct', $correct);

		$score->save();

	}
}