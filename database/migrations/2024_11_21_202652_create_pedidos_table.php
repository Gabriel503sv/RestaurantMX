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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->text('id_usuario');
            $table->string('fecha');
            $table->string('costo_envio');
            $table->string('monto');
            $table->string('status');

            $table->foreignId('id_tipopago')
                   ->nullable()
                   ->constrained('tipopagos')
                   ->cascadeOnUpdate()
                   ->nullOnDelete();
            $table->string('direccion_envio');
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
        Schema::dropIfExists('pedidos');
    }
};
