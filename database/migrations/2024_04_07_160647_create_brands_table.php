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
            DBTables::BRANDS,
            function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('image');
                $table->string('link')->nullable();
                $table->string('order')->default(General::ONE);
                $table->tinyInteger('status')->default(Status::INACTIVE);
                $table->json('metadata')->nullable();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(DBTables::BRANDS);
    }
};
