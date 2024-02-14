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
        Schema::create('ingidients', function (Blueprint $table) {
            $table->id();
            $table->string('Title')
                ->unique();
            $table->integer('CategoryId');
            $table->timestamps();
            $table->foreign('CategoryId')
                ->references('id')
                ->on('menu_categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingidients');
    }
};
