<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * comando==> php artisan make:migration create_usuario_table
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();//autoincremental
            $table->string("nombre",50);//varchar(50)
            $table->string("correo",100)->unique();
            $table->string("pass",100);
            $table->boolean("activo")->default(true);
            $table->timestamps();//created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
};
