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
            DBTables::EVENTS,
            function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->nullable();
                $table->string('image')->nullable();
                $table->longText('excerpt')->nullable();
                $table->longText('description')->nullable();
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->time('time')->nullable();
                $table->string('venue')->nullable();
                $table->string('type')->nullable();
                $table->tinyInteger('status')->default(Status::ACTIVE);
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
        Schema::dropIfExists(DBTables::EVENTS);
    }
};
