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
        Schema::create('portfolio', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->string("tags")->nullable();
            $table->text("about")->nullable();
            $table->text("description")->nullable();
            $table->string("website")->nullable();
            $table->string("keywords")->nullable();
            $table->boolean("status")->default(0);
            $table->integer("order")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio');
    }
};
