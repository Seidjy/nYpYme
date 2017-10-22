<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRulesToAchievesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules_to_achieves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',40);
            $table->integer('idTypeAchieve')->unsigned();;
            $table->integer('amount');
            $table->boolean('gather');
            $table->timestamps();
            $table->foreign('idTypeAchieve')->references('id')->on('type_achieves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rules_to_achieves');
    }
}
