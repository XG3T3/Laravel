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
        Schema::create('students',function(Blueprint $table){
            $table->id();
            $table->string('name',32);
            $table->string('telefono',16)->nullable();
            $table->unsignedInteger('age')->nullable();
            $table->string('password',64);
            $table->string('email',64)->unique();
            $table->string('sexo',32);
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
        //
    }
};
