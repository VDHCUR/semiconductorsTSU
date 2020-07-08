<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('profiles_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->string('name', 100);
            $table->boolean('deleted')->default(0);
            $table->timestamps();

            $table->foreign('profiles_id')->references('id')->on('profiles')->onDelete('set null');
            $table->foreign('teacher_id')->references('id')->on('persons')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
