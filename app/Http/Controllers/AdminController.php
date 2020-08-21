<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends Controller {

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deletePastTrainingTimes() {
        Artisan::call( 'shmc:removepasttrainings' );

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUnusedPhotos() {
        Artisan::call( 'shmc:removeunusedphotos' );

        return redirect()->back();
    }
}
