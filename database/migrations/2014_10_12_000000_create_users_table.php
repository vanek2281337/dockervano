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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName')
                ->nullable(true);
            $table->string('LastName')
                ->nullable(true);
            $table->string('Phone')
                ->unique();
            $table->enum('Role', ["Администратор", "Клиент", "Менеджер"]);
            $table->string('Code')
                ->unique()
                ->nullable(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
