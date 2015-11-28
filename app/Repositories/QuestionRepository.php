<?php

namespace App\Repositories;

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

}