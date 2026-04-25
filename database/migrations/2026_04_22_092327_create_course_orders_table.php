<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('course_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->integer('qty')->default(1);

            $table->enum('payment_status', ['pending', 'paid', 'cancelled'])->default('pending');
            $table->boolean('access_granted')->default(false);

            $table->timestamp('paid_at')->nullable();
            $table->timestamp('access_granted_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_orders');
    }
};