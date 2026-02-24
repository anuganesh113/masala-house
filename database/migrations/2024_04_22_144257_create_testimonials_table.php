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
            DBTables::TESTIMONIALS,
            function (Blueprint $table) {
                $table->id();
                $table->foreignId('member_message_id')
                    ->nullable()
                    ->constrained(DBTables::MEMBER_MESSAGES)
                    ->cascadeOnDelete();
                $table->string('name');
                $table->string('designation')->nullable();
                $table->string('image')->nullable();
                $table->text('message')->nullable();
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
        Schema::dropIfExists(DBTables::TESTIMONIALS);
    }
};
