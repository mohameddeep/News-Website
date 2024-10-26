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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("sitename");
            $table->string("favicon");
            $table->string("logo");
            $table->string("fecabook");
            $table->string(column: "instgram");
            $table->string("twitter");
            $table->string("yotube");
            $table->string("street");
            $table->string("country");
            $table->string("city");
            $table->string("email");
            $table->string("phone");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
