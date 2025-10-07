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
        Schema::create('congregacoes_eventos', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('eventos_id');
            $table->unsignedBigInteger('congregacoes_id');
            $table->timestamps();

            $table->foreign('eventos_id')
                ->references('id')
                ->on('eventos');

            $table->foreign('congregacoes_id')
                ->references('id')
                ->on('congregacoes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('congregacoes_eventos');
    }
};
