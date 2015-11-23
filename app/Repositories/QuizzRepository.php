<?php namespace App\Repositories;

use App\Models\Quizz;

class QuizzRepository {

	/**
	 * @param $inputs
     */
	public function store($inputs)
	{

		$quizz = new Quizz();
		$quizz->fill($inputs);
		$quizz->save();
	}

}