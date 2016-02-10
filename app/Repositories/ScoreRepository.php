<?php namespace App\Repositories;

use App\Models\Score;

class ScoreRepository {

	const FB_ID = 999;

	/**
	 * @param $answer
	 * @param $unansweredQuestion
     */
	public function checkAndStore($answer, $unansweredQuestion)
	{
		if ($answer->correct) {
			$correct = true;
		} else {
			$correct = false;
		}

		$unansweredQuestion->answer()->associate($answer);
		$unansweredQuestion->setAttribute('already_answered', true);
		$unansweredQuestion->setAttribute('correct', $correct);
		$unansweredQuestion->save();
	}

	/**
	 * @param $quizz
	 * @param $question
     */
	public function storeUnansweredQuestion($quizz, $question)
	{
		$score = new Score();
		$score->setAttribute('user_id', self::FB_ID);
		$score->quizz()->associate($quizz);
		$score->question()->associate($question);
		$score->setAttribute('answer_id', null);
		$score->setAttribute('already_answered', false);
		$score->setAttribute('correct', null);

		$score->save();
	}

	/**
	 * @param $quizz
	 * @return mixed
     */
	public function getUnansweredQuestion($quizz)
	{
		$unansweredQuestion = Score::where('user_id', self::FB_ID)
			->where('quizz_id', $quizz->id)
			->where('already_answered', false)
			->first();

		return $unansweredQuestion;
	}

	/**
	 * @param $quizz
	 * @return mixed
     */
	public function getAnsweredQuestionNbr($quizz)
	{
		$nbrAnsweredQuestion = Score::where('user_id', self::FB_ID)
			->where('quizz_id', $quizz->id)
			->where('already_answered', true)
			->count();

		return $nbrAnsweredQuestion;
	}

	/**
	 * @param $quizz
	 * @return mixed
     */
	public function getAnsweredQuestions($quizz)
	{
		$answeredQuestions = Score::where('user_id', self::FB_ID)
			->where('quizz_id', $quizz->id)
			->where('already_answered', true)
			->get();

		return $answeredQuestions;
	}

}