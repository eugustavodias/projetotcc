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
        Schema::create('congrecacoes_estudos', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('estudos_id');
            $table->unsignedBigInteger('congregacoes_id');
            $table->timestamps();

            $table->foreign('estudos_id')
                ->references('id')
                ->on('estudos');

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
        Schema::dropIfExists('congrecacoes_estudos');
    }
};
