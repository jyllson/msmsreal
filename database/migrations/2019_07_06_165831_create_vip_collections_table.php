<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVipCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vip_collections', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('month_id')->unsigned();
            $table->float('vip_lok_pop_sum')->nullable();
            $table->float('vip_lok_prp_sum')->nullable();
            $table->float('vip_lok_db')->nullable();
            $table->float('vip_lipb_pop_sum')->nullable();
            $table->float('vip_lipb_prp_sum')->nullable();
            $table->float('vip_lipb_db')->nullable();
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
        Schema::dropIfExists('vip_collections');
    }
}
