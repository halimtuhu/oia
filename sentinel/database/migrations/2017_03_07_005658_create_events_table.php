<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('judul');
            $table->string('pelaksana');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('tempat');
            $table->string('uploader');
            $table->string('desk_pre')->nullable();
            $table->string('desk_live')->nullable();
            $table->string('desk_post')->nullable();
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
