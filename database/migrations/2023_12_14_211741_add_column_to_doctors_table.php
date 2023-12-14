<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Branch::class)->constrained('branches')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Location::class,'city_id')->nullable()->constrained('locations')->nullOnDelete();
            $table->foreignIdFor(\App\Models\Location::class,'area_id')->nullable()->constrained('locations')->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            //
        });
    }
}
