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
        Schema::create('purchases_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('UserId');
            $table->enum('Status', ['Заказ готовится', 'Курьер в пути', 'Готово']);
            $table->float('Price');
            $table->jsonb('Values');
            $table->string('SetDate');
            $table->string('SetTime');
            $table->timestamps();
            $table->foreign('UserId')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases_histories');
    }
};
