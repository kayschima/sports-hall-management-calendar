<?php

namespace App\Http\Controllers;

/**
 * Class TrainingTimeController
 * @package App\Http\Controllers
 */
class TrainingTimeController extends Controller {
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view( 'trainingtimes' );
    }
}
