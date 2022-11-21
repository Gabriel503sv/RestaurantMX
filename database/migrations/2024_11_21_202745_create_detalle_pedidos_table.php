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
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('precio');
            $table->string('cantidad');

            $table->integer('status');

            $table->foreignId('id_pedido')
                ->nullable()
                ->constrained('pedidos')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('id_combo')
                ->nullable()
                ->constrained('combos')
                ->cascadeOnUpdate()
                ->nullOnDelete();

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
        Schema::dropIfExists('detalle_pedidos');
    }
};
