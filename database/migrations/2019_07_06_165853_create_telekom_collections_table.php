<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelekomCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telekom_collections', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('month_id')->unsigned();
            $table->float('lok_billed_postpaid')->nulled();
            $table->float('lok_collected_m4')->nulled();
            $table->float('lok_collected_m3')->nulled();
            $table->float('lok_collected_m2')->nulled();
            $table->float('lok_collected_m1')->nulled();
            $table->float('lok_db')->nulled();
            $table->float('lipb_collected_m4')->nulled();
            $table->float('lipb_collected_m3')->nulled();
            $table->float('lipb_collected_m2')->nulled();
            $table->float('lipb_collected_m1')->nulled();
            $table->float('lipb_db')->nulled();
            $table->timestamps();
            $table->foreign('month_id')->references('id')->on('months');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telekom_collections');
    }
}
