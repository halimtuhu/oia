<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKerjasamasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('kerjasamas', function (Blueprint $table) {
          $table->increments('id');
          $table->string('instansi');
          $table->string('jenis');
          $table->string('bentuk');
          $table->string('isi');
          $table->date('tgl_mulai');
          $table->date('tgl_expired');
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
      Schema::dropIfExists('kerjasamas');
  }
}
