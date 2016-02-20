<?php namespace App\Repositories;

use App\Models\Score;
use App\Models\User;
use Carbon\Carbon;

class ScoreRepository {

	//TODO REMPLACER PAR LE USER CONNECTE
	public function getUser(){
		return User::findOrFail(10207739955836859);
	}

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
		$score->user()->associate($this->getUser());
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
		$unansweredQuestion = Score::where('user_id', $this->getUser()->id)
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
		$nbrAnsweredQuestion = Score::where('user_id', $this->getUser()->id)
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
		$answeredQuestions = Score::where('user_id', $this->getUser()->id)
			->where('quizz_id', $quizz->id)
			->where('already_answered', true)
			->get();

		return $answeredQuestions;
	}

	public function scoreResult($quizz)
	{
		$scoreResult = Score::where('user_id', $this->getUser()->id)
			->where('quizz_id', $quizz->id)
			->where('already_answered', true)
			->where('correct', true)
			->count();

		return $scoreResult;
	}

	public function scoreClassement($quizz)
	{
		$scoreUsers = Score::where('quizz_id', $quizz->id )
		->groupBy('user_id')->get();

		$scoreClassement = array();
		foreach($scoreUsers as $score) {

			$timeQuestion = Score::where('user_id', $score->user_id)
				->where('quizz_id', $quizz->id)
				->where('already_answered', true)
				->get();

			$timeFirstQuestion = $timeQuestion->first()->created_at;

			$timeQuestion = Score::where('user_id', $score->user_id)
				->where('quizz_id', $quizz->id)
				->where('already_answered', true)
				->get();

			$timeLastQuestion  = $timeQuestion->last()->updated_at;

			Carbon::setLocale('fr');
			$time = $timeLastQuestion->diffForHumans($timeFirstQuestion, true);


			$scoreUser = Score::where('user_id', $score->user_id)
				->where('quizz_id', $quizz->id)
				->where('already_answered', true)
				->where('correct', true)
				->count();

			$user = User::where('id',$score->user_id)->first();


			$scoreClassement[$user->id] = ['prenom' => $user->first_name, 'profil' => 'facebook.com/'.$user->id ,'score' => $scoreUser, 'time' => $time];
		}

		$classementCollect = collect($scoreClassement);
		$classementCollect
			->sortBy('score')
			->sortByDesc('time');
		return $classementCollect;
	}

}