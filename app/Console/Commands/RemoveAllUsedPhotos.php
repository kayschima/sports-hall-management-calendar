<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Symfony\Component\Finder\Finder;

class RemoveAllUsedPhotos extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shmc:removeallusedphotos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove all photos that were thrown away by profile administration';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $finder = new Finder();
        $finder->files()->in( storage_path( 'app/photos' ) );

        $photos = Arr::flatten( User::query()->select( 'photo' )->get()->toArray() );

        foreach ( $finder as $file ) {
            $filename = 'photos/' . $file->getFilename();
            if ( in_array( $filename, $photos ) ) {
                $this->info( __('Kept') . ': '. $filename );
            } else {
                unlink( $file->getRealPath());
                $this->error( __('Deleted') . ': ' . $filename );
            }


        }
    }
}
