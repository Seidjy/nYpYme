<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCustomer')->unsigned();;
            $table->integer('idTypeTransactions')->unsigned();;
            $table->integer('amount');
            $table->timestamps();
            $table->foreign('idCustomer')->references('id')->on('customers');
            $table->foreign('idTypeTransactions')->references('id')->on('type_transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deals');
    }
}
