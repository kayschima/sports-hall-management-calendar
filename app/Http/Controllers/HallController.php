<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class HallController
 * @package App\Http\Controllers
 */
class HallController extends Controller {

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view( 'halls' );
    }
}
