<?php namespace App\Repositories;

use App\Models\Answer;

class AnswerRepository {

	/**
	 * @return mixed
	 */
	public function getTrue($questionId) {
		return Answer::where('correct', 1)->where('question_id', $questionId)->first();
	}
}