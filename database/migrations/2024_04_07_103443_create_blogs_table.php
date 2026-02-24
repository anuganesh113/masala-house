<?php

use App\Constants\DBTables;
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
            DBTables::BLOGS,
            function (Blueprint $table) {
                $table->id();
                $table->string('tag')->nullable();
                $table->string('name');
                $table->string('slug')->nullable();
                $table->string('image')->nullable();
                $table->string('image_alt')->nullable();
                $table->text('excerpt')->nullable();
                $table->longText('description')->nullable();
                $table->string('author')->nullable();
                $table->tinyInteger('status')->default(Status::ACTIVE);
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
        Schema::dropIfExists(DBTables::BLOGS);
    }
};
