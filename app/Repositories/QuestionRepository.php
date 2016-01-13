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
		$answersLabels = $inputs['answerLabel'];

		$answers = [];
		foreach ($answersLabels as $key => $answersLabel){
			//Creating Answer object
			$answerEntity = new Answer();
			$answerEntity->setAttribute('label', $answersLabel);

			if ($key == key($inputs['answerChecked'])) {
				$answerEntity->setAttribute('correct', true);
			} else {
				$answerEntity->setAttribute('correct', false);
			}

			$answers[] = $answerEntity;
		}

		//Insert the question
		$question = new Question();
		$question->fill($inputs);
		$question->save();

		//Insert all the answers
		$question->answers()->saveMany($answers);

	}

	public function update($id, $inputs)
	{
		$question = Question::find($id);
		$answersLabels = $inputs['answerLabel'];

		foreach ($question->answers as $key => $answer){
			$answer->setAttribute('label', $answersLabels[$key]);

			if ($key == key($inputs['answerChecked'])) {
				$answer->setAttribute('correct', true);
			} else {
				$answer->setAttribute('correct', false);
			}

			$answer->save();
		}

		$question->fill($inputs);
		$question->save();
	}

}