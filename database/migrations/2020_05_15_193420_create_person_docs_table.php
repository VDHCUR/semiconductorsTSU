<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_docs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('persons_id')->nullable();
            $table->string('name', 200);
            $table->string('path', 200);
            $table->boolean('deleted')->default(0);
            $table->timestamps();

            $table->foreign('persons_id')->references('id')->on('persons')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_docs');
    }
}
