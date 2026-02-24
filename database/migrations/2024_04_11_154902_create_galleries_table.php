<?php

use App\Constants\DBTables;
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
            DBTables::GALLERIES,
            function (Blueprint $table) {
                $table->id();
                $table->foreignId('album_id')->constrained(DBTables::ALBUMS)->cascadeOnDelete();
                $table->string('image');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(DBTables::GALLERIES);
    }
};
