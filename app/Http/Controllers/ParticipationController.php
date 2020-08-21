<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class ParticipationController
 * @package App\Http\Controllers
 */
class ParticipationController extends Controller {

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index( $id ) {
        return view( 'participations', [ 'trainingtime_id' => $id ] );
    }
}
