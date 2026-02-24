<?php

use App\Constants\DBTables;
use App\Constants\General;
use App\Enums\MemberType;
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
            DBTables::MEMBER_MESSAGES,
            function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->nullable();
                $table->string('designation')->nullable();
                $table->string('image')->nullable();
                $table->text('message')->nullable();
                $table->string('type')->default(MemberType::TEAM);
                $table->integer('order')->default(General::ZERO);
                $table->string('status')->default(Status::ACTIVE);
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
        Schema::dropIfExists(DBTables::MEMBER_MESSAGES);
    }
};
