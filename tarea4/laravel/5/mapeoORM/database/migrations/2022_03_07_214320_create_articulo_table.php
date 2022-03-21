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
        Schema::create('articulo', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->double("precio");
            $table->text("descripcion");
            $table->unsignedBigInteger("proveedor_id");
            $table->string("slug")->unique();
            $table->timestamps();
            $table->softDeletes();// añade la columna deleted_at
            $table->foreign('proveedor_id')->references('id')->on('proveedor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo');
    }
};
