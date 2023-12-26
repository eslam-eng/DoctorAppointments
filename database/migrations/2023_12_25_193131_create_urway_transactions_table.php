<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrwayTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urway_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id');
            $table->string('tran_id');
            $table->string('track_id')->comment('id reference to the model that i pay');
            $table->string('track_type')->comment('to handle if there is more than type model like buy products and make appointments ');
            $table->string('amount');
            $table->string('masked_pan');
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
        Schema::dropIfExists('urway_transactions');
    }
}
