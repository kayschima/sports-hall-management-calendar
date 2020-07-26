<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingTimesUsersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'training_time_user', function ( Blueprint $table ) {
            $table->id();
            $table->foreignId( 'training_time_id' )->constrained()->cascadeOnDelete();
            $table->foreignId( 'user_id' )->constrained()->cascadeOnDelete();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'training_time_user' );
    }
}
