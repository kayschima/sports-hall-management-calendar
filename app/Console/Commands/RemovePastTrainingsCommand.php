<?php

namespace App\Console\Commands;

use App\TrainingTime;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RemovePastTrainingsCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shmc:removepasttrainings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove all training times of the past';

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
        $result = TrainingTime::query()
                              ->where( 'date', '<', Carbon::today() )
                              ->delete();

        $this->info( $result . ' ' . __( 'records were deleted' ) );

        return 0;

    }
}
