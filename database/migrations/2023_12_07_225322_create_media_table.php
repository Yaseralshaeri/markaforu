<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->morphs('mediable')->default(0);
            $table->string('media_name');
            $table->string('media_description')->nullable();
            $table->json('path');
            $table->integer('show_in')->nullable();
        });
    }
};
