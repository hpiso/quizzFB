<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quizz;
use App\Repositories\QuizzRepository;
use DateTime;

class FrontController extends Controller {

    protected $quizzRepository;

    public function __construct(QuizzRepository $quizzRepository)
    {
        $this->quizzRepository = $quizzRepository;
    }

    public function index() {
        $quizz = $this->quizzRepository->getActif();

        $startingDate = new DateTime($quizz->starting_at);
        $startingDate = $startingDate->format('d-m-Y') ;
        $endingDate = new DateTime($quizz->ending_at);
        $endingDate = $endingDate->format('d-m-Y') ;
        return view('front.index', [
            'quizz'         => $quizz,
            'startingDate' => $startingDate,
            'endingDate' => $endingDate
        ]);
    }

    public function result() {
        return view('front.result');
    }

    public function quizz() {
        $quizz = $this->quizzRepository->getActif();

        return view('front.quizz', [
            'quizz' => $quizz
        ]);
    }
}

