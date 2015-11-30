<?php

namespace App\Repositories;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quizz;

class QuestionRepository {

	public function filter($inputs)
	{
		//No filter
		$entities = Question::all();

		//Filter by quizz
		if($inputs['quizz'] && $inputs['quizz'] !=''){
			$entities = Quizz::find($inputs['quizz'])->questions;
		}

		return $entities;
	}

	/**
	 * @param $inputs
     */
	public function store($inputs)
	{
		$answerNbr = $inputs['answerNbr'];

		$answers = [];
		for($i=1; $i<=$answerNbr; $i++){

			$answer = new Answer();
			$answer->setAttribute('label', $inputs['answerLabel'.$i.'']);
			if (array_key_exists('answerChecked'.$i.'', $inputs)) {
				$answer->setAttribute('correct', true);
			}else{
				$answer->setAttribute('correct', false);
			}
			$answers[] = $answer;
		}

		//Insert the question
		$question = new Question();
		$question->fill($inputs);
		$question->save();

		//Insert all the answers
		$question->answers()->saveMany($answers);

	}

}