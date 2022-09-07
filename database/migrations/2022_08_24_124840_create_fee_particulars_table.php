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
        Schema::create('fee_particulars', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('admission_fee');
            $table->unsignedInteger('registration_fee');
            $table->unsignedInteger('books');
            $table->striunsignedIntegerng('uniform');
            $table->striunsignedIntegerng('fine');
            $table->unsignedInteger('other');
            $table->unsignedInteger('per_course_fee');
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
        Schema::dropIfExists('fee_particulars');
    }
};
