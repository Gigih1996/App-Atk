<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKabinetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kabinets', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('nomor_kabinet', 10);
            $table->unsignedInteger('roles_id')->default(0);
            $table->string('nama_kabinet', 100);
            $table->text('uraian');
            $table->text('keterangan')->nullable();
            $table->timestamps();


            $table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kabinets');
    }
}
