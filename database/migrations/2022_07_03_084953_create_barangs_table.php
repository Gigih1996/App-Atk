<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->integerIncrements('id',100);
            $table->char('name',100);
            $table->unsignedInteger('unit_id',100);
            $table->integer('sum', 100);
            $table->unsignedInteger('type_id',100);
            $table->timestamps();
            
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade'); 
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
