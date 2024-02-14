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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->integer('CategoryId');
            $table->string('Title', 300)
                ->unique();
            $table->text('Description');
            $table->string('Image');
            $table->float('Price');
            $table->string('Slug')
                ->unique();
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
        Schema::dropIfExists('menus');
    }
};
