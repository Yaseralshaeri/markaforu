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
        Schema::table('products', function (Blueprint $table) {
            $table->fullText(['product_name','description','keyword','old_price','new_price'],'search');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
