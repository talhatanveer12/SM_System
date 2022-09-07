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
        Schema::create('fee_particular_amounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('admission_fee');
            $table->unsignedInteger('registration_fee');
            $table->unsignedInteger('books');
            $table->unsignedInteger('uniform');
            $table->unsignedInteger('fine');
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
        Schema::dropIfExists('fee_particular_amounts');
    }
};
