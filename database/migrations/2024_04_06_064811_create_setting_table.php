<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            DBTables::SETTING,
            function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('white_logo')->nullable();
                $table->string('color_logo')->nullable();
                $table->string('email')->nullable();
                $table->string('address')->nullable();
                $table->string('contact')->nullable();
                $table->string('phone')->nullable();
                $table->text('footer_text')->nullable();
                $table->json('metadata')->nullable();
                $table->json('social')->nullable();
                $table->json('seo')->nullable();
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists(DBTables::SETTING);
    }
};
