<?php

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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
               $table->string('name');
                $table->string('title')->nullable();
                $table->string('tag')->nullable();
                $table->string('slug')->nullable();
                $table->string('image')->nullable();
                $table->string('icon')->nullable();
              $table->string('order')->default(General::ONE);
                $table->text('excerpt')->nullable();
               $table->tinyInteger('status')->default(Status::INACTIVE);
                $table->text('description')->nullable();
                $table->json('metadata')->nullable();
                $table->json('seo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};
