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
        Schema::create('affiliate_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('referral_id');
            $table->unsignedBigInteger('order_id');
            $table->string('referral_earning', 20);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign('referral_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliate_transactions');
    }
};
