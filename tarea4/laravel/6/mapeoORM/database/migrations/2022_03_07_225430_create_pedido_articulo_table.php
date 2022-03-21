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
        Schema::create('pedido_articulo', function (Blueprint $table) {
            $table->unsignedBigInteger("pedido_id");
            $table->unsignedBigInteger("articulo_id");
            $table->bigInteger("cantidad");
            $table->double("subtotal");
            $table->timestamps();
            $table->foreign('pedido_id')->references('id')->on('pedido')->onDelete('cascade');
            $table->foreign('articulo_id')->references('id')->on('articulo')->onDelete('cascade');
            $table->primary(["pedido_id","articulo_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_articulo');
    }
};
