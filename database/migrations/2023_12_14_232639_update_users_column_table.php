<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersColumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['first_name','last_name']);
            $table->string('name');
            $table->tinyInteger('type')->default(\App\Enum\UsersType::CUSTOMER->value);
            $table->foreignIdFor(\App\Models\Location::class)->nullable()->constrained('locations');
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
