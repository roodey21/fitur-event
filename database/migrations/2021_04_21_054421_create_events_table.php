<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('foto');
            $table->enum('type', ['online','offline']);
            $table->string('location');
            $table->foreignId('priority_id');
            $table->foreignId('author_id');
            $table->foreignId('inkubator_id');
            $table->longText('description');
            $table->enum('publish', [1,0]);
            $table->date('start_date');
            $table->time('start_time', 0);
            $table->date('end_date');
            $table->time('end_time', 0);
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
        Schema::dropIfExists('events');
    }
}
