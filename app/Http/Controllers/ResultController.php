<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 20/11/2015
 * Time: 15:13
 */

namespace App\Http\Controllers;


class ResultController
{

    public function __construct() {
    }

    public function index() {
        return view('result.index');
    }
}