<?php namespace App\Repositories;

use App\Models\Score;

class ScoreRepository {

	public function storeUnansweredQuestion($quizz, $question)
	{
		$idFb = 999;

		$score = new Score();
		$score->setAttribute('fb_id', $idFb);
		$score->quizz()->associate($quizz);
		$score->question()->associate($question);
		$score->setAttribute('answer_id', null);
		$score->setAttribute('already_answer', false);
		$score->setAttribute('correct', null);

		$score->save();
	}
}