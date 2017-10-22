<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRulesToRestrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules_to_restricts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',40);
            $table->integer('idTypeRestrict')->unsigned();;
            $table->integer('amount');
            $table->timestamps();
            $table->foreign('idTypeRestrict')->references('id')->on('type_restricts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rules_to_restricts');
    }
}
