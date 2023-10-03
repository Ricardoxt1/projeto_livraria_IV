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
        //
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cpf', 14 )->index();
            $table->string('name', 100)->index();
            $table->string('phone_number', 11)->index();
            $table->string('address', 100)->index();
            $table->string('email', 255)->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // reverter Schema::create
        Schema::dropIfExists('customers');

    }
};
