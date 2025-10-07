<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descricao');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->string('link');
            $table->unsignedBigInteger('anexos_id');
            $table->unsignedBigInteger('tipos_eventos_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('anexos_id')
                ->references('id')
                ->on('anexos');

            $table->foreign('tipos_eventos_id')
                ->references('id')
                ->on('tipos_eventos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
