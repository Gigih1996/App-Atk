<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('employee_id')->default(0);
            $table->unsignedInteger('product_id')->default(0);
            $table->unsignedInteger('unit_id')->default(0);
            $table->Integer('total');
            $table->unsignedInteger('departement_id')->default(0);
            $table->date('date');
            $table->enum('type', ['In', 'Out']);
            $table->unsignedInteger('supplier_id')->default(0);;
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('departement_id')->references('id')->on('departements')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
