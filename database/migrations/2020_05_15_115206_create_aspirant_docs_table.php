<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspirantDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspirant_docs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('aspirant_infos_id')->nullable();
            $table->string('name', 200);
            $table->string('path', 200);
            $table->boolean('deleted')->default(0);
            $table->timestamps();

            $table->foreign('aspirant_infos_id')->references('id')->on('aspirant_infos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aspirant_docs');
    }
}
