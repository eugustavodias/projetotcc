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
        Schema::create('estudos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data');
            $table->string('link');
            $table->unsignedBigInteger('anexos_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('anexos_id')
                ->references('id')
                ->on('anexos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudos');
    }
};
