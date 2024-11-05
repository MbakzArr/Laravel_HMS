<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medication_patient', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->after('id');
            $table->unsignedBigInteger('medication_id')->after('patient_id');
            $table->timestamp('assigned_at')->nullable()->after('medication_id'); // Make sure this line is included
            $table->timestamps();

            // Adding foreign keys if needed
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('medication_id')->references('id')->on('medications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('medication_patient', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
            $table->dropForeign(['medication_id']);
        });

        Schema::dropIfExists('medication_patient');
    }
};
