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
        Schema::create('shoppingcarts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ordername', 95)->nullable();
            $table->string('orderstatus', 95)->nullable();
            $table->string('course_id', 95)->nullable();
            $table->string('price', 95)->nullable();
            $table->string('user_id', 95)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoppingcarts');
    }
};
