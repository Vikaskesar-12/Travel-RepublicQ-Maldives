<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('website_traffic', function (Blueprint $table) {
            $table->id();
            $table->string('source'); // Traffic Source (e.g., Search Engine, Direct)
            $table->integer('visitors'); // Number of visitors
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_traffic');
    }
};
