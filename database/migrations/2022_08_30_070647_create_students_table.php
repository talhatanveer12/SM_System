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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('admission_no')->unique();;
            $table->string('roll_no')->unique();;
            $table->unsignedBigInteger('class_id');
            $table->string('date_of_birth');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('Gender');
            $table->string('Category');
            $table->string('email')->unique();;
            $table->string('religion');
            $table->string('student_photo')->nullable();
            $table->string('admission_date');
            $table->string('father_name')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_photo')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_photo')->nullable();
            $table->string('guardian_options');
            $table->string('guardian_name');
            $table->string('guardian_relation');
            $table->string('guardian_email');
            $table->string('guardian_photo')->nullable();
            $table->string('guardian_phone');
            $table->string('guardian_occupation')->nullable();
            $table->string('guardian_address');
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('classes')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
