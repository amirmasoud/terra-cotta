<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->string('value')->nullable();
            $table->unsignedInteger('icon_id')->nullable();
            $table->foreign('icon_id')->references('id')
                  ->on('icons')->onDelete('SET NULL');
            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')
                  ->on('types')->onDelete('cascade');
            $table->unsignedInteger('group_id');
            $table->foreign('group_id')->references('id')
                  ->on('groups')->onDelete('cascade');
            $table->unsignedInteger('safe_id');
            $table->foreign('safe_id')->references('id')
                  ->on('safes')->onDelete('cascade');
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
        Schema::dropIfExists('fields');
    }
}
