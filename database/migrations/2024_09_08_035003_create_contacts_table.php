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
            DBTables::CONTACTS,
            function (Blueprint $table) {
                $table->id();
                $table->json('metadata')->nullable();
                $table->tinyInteger('seen')->default(Status::INACTIVE);
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(DBTables::CONTACTS);
    }
};
