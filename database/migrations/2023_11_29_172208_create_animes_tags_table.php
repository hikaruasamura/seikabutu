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
        Schema::create('animes_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anime_id')->constrained('anime');
            $table->foreignId('tag_id')->constrained('tag');
            $table->primary(['anime_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animes_tags');
    }
};
