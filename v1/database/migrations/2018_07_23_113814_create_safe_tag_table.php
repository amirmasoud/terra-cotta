<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSafeTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('safe_tag', function (Blueprint $table) {
            $table->unsignedInteger('safe_id')->nullable();
            $table->foreign('safe_id')->references('id')
                   ->on('safes')->onDelete('cascade');

            $table->unsignedInteger('tag_id')->nullable();
            $table->foreign('tag_id')->references('id')
                  ->on('tags')->onDelete('cascade');

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
        Schema::dropIfExists('safe_tag');
    }
}
