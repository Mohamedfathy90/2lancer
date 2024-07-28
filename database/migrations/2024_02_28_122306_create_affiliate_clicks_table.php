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
        Schema::create('affiliate_clicks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('referral_id');
            $table->timestamps();
            $table->foreign('referral_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
            
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliate_clicks');
    }
};
