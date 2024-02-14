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
        Schema::create('ingridient_baskets', function (Blueprint $table) {
            $table->id();
            $table->string('IngridientCode');
            $table->integer('IngridientId');
            $table->integer('Count');
            $table->timestamps();
            $table->foreign('IngridientCode')
                ->references('IngridientCode')
                ->on('baskets')
                ->onDelete('cascade');
            $table->foreign('IngridientId')
                ->references('id')
                ->on('ingidients')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingridient_baskets');
    }
};
