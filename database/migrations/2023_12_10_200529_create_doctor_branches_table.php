<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_branches', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Doctors::class)->constrained('doctors')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Branch::class)->constrained('branches')->cascadeOnDelete();
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
        Schema::dropIfExists('doctor_branches');
    }
}
