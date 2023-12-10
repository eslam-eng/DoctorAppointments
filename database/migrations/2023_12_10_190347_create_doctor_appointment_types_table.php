<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorAppointmentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('doctor_appointment_types', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Doctors::class)->constrained('doctors')->cascadeOnDelete();
            $table->tinyInteger('appointment_type');
            $table->decimal('price');
            $table->enum('status',[0,1])->default(1);
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
        Schema::dropIfExists('doctor_appointment_types');
    }
}
