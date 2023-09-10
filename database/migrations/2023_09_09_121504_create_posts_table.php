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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title")->collation("utf8_general_ci");
            $table->text("summary")->collation("utf8_general_ci");
            $table->text("body")->collation("utf8_general_ci");
            $table->integer("view")->default(0);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('cat_id')->constrained('categories');
            $table->text("text");
            $table->enum('status',["enable","disable"])->default("disable");
            $table->tinyInteger('selelcted');
            $table->tinyInteger('breaking_news');
            $table->dateTime('published_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
