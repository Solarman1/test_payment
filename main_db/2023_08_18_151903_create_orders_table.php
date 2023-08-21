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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('tariff_id')->constrained('tariffs');
            $table->float('price', 14)->comment('Сумма к оплате');
            $table->integer('discount')->nullable();
            $table->integer('month_count')->comment('Количество месяцев подписки');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->integer('editors_count');
            $table->integer('readers_count');
            $table->integer('memory_space');
            $table->boolean('expired')->default('false')->comment('Если время подписки прошло, воркер проставит false, при создании также false');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
