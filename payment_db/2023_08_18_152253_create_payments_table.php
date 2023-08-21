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
        Schema::create('payment_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('queue_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('order_id');
            $table->string('payment_type')->comment('Тип оплаты заявки');
            $table->timestamps();
        });

        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 15)->comment('Общая сумма для оплаты');
            $table->json('transaction_data')->comment(
                'Данные банка или компании также может хранится ссылка на pdf/html счет'
            );
            $table->foreignId('payment_request_id')->nullable();
            $table->boolean('payment_status')->default(false)->comment('Статус оплаты');
            $table->boolean('activate_status')->default(true)->comment('Статус актуальности заявки, 0 если отменена');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_requests');
        Schema::dropIfExists('payment_transactions');
    }
};
