<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetricsDataPointsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metrics', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('m');
                $table->integer('n');
                $table->timestamps();
        });

        Schema::create('data_points', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('metric_id')->unsigned();
                $table->foreign('metric_id')->references('id')->on('metrics');
                $table->decimal('value', 10, 10);
                $table->date('date');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_points');
        Schema::dropIfExists('metrics');
    }
}
