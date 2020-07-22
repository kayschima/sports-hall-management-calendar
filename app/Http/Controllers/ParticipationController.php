<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipationController extends Controller {
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index( $id ) {
        return view( 'participations', [ 'trainingtime_id' => $id ] );
    }
}
