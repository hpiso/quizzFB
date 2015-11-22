<?php namespace App\Repositories;

use App\Models\Theme;

class ThemeRepository {


	/**
	 * @param $inputs
     */
	public function store($inputs)
	{
		$theme = new Theme();
		$theme->fill($inputs);
		$theme->save();
	}


	/**
	 * @param $id
	 * @param $inputs
     */
	public function update($id, $inputs)
	{
		$theme = Theme::find($id);
		$theme->fill($inputs);
		$theme->save();

	}

}