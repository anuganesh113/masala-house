<?php

use App\Constants\DBTables;
use App\Constants\General;
use App\Enums\Status;
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
        Schema::create(
            DBTables::PAGES,
            function (Blueprint $table) {
                $table->id();
                $table->foreignId('page_id')
                    ->nullable()
                    ->constrained(DBTables::PAGES)
                    ->onDelete('cascade');
                $table->string('name');
                $table->string('title')->nullable();
                $table->string('slug')->unique()->nullable();
                $table->string('image_one')->nullable();
                $table->string('image_one_alt')->nullable();
                $table->string('image_two')->nullable();
                $table->string('image_two_alt')->nullable();
                $table->text('excerpt')->nullable();
                $table->longText('description')->nullable();
                $table->string('template')->nullable();
                $table->integer('order')->default(General::ZERO);
                $table->tinyInteger('status')->default(Status::INACTIVE);
                $table->json('images')->nullable();
                $table->json('metadata')->nullable();
                $table->json('seo')->nullable();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(DBTables::PAGES);
    }
};
