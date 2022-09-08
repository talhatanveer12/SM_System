<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedInteger('monthly_fee');
            $table->string('admission_fee_status');
            $table->date('fee_submit_date');
            $table->unsignedInteger('fee_submit_amount');
            $table->unsignedInteger('admission_fee');
            $table->unsignedInteger('registration_fee');
            $table->unsignedInteger('books');
            $table->unsignedInteger('uniform');

            $table->string('fee_month');
            $table->unsignedInteger('Total_fee');
            $table->unsignedInteger('remaining_fee');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees');
    }
};
