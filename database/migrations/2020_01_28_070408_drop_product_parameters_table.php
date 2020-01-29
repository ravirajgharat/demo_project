<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropProductParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('product_parameters');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('product_parameters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('parameter');
            $table->string('parameter_value');
            $table->integer('product_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
