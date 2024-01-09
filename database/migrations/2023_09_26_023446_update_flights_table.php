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
        // 기존 flights 테이블에 misc 칼럼을 추가한다. 
        Schema::table('flights', function (Blueprint $table) {
           $table->string("misc")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 기존 flights 테이블에서 misc 칼럼을 제거한다. 
        Schema::table('flights', function (Blueprint $table) {
            $table->dropColumn('misc');
        });

    }
};
