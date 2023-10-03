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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('library_id')->index();
            $table->string('name', 100)->index();
            $table->string('pis', 11)->index();
            $table->string('office', 70)->index();
            $table->string('departament', 70)->index();
            $table->timestamps();
            $table->softDeletes();

            //constrants
            $table->foreign('library_id')->references('id')->on('library');
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
