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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no')->unique();;
            $table->string('employee_no')->unique();;
            $table->unsignedBigInteger('course_id');
            $table->string('date_of_birth');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('category');
            $table->string('email')->unique();;
            $table->string('religion');
            $table->string('employee_photo')->nullable();
            $table->string('joining_date');
            $table->string('cnic_no');
            $table->string('phone');
            $table->string('eduction');
            $table->string('specialization');
            $table->string('employee_address');
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
