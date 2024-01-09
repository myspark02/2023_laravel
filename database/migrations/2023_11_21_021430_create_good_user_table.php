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
        Schema::create('good_user', function (Blueprint $table) {
            $table->id();
            // 주문자 아이디
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // 상품 아이디
            $table->foreignId('good_id')->constrained()->onDelete('cascade');
            // 주문량
            $table->unsignedInteger('amount')->default(1);
            $table->timestamp('ordered_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('good_user');
    }
};
