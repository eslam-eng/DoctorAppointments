<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditQuestionsAndRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
            $table->morphs('relatable');
        });
        Schema::table('replies', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
            $table->morphs('relatable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
