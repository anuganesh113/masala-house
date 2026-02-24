<?php

use App\Constants\DBTables;
use App\Enums\FoodType;
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
            DBTables::MENUS,
            function (Blueprint $table) {
                $table->id();
                $table->foreignId('category_id')
                    ->constrained(DBTables::CATEGORIES)
                    ->cascadeOnDelete();
                $table->string('name');
                $table->string('slug')->nullable();
                $table->string('image')->nullable();
                $table->string('image_alt')->nullable();
                $table->text('excerpt')->nullable();
                $table->text('description')->nullable();
                $table->decimal('old_price', 10, 2)->nullable();
                $table->decimal('price', 10, 2)->nullable();
                $table->string('type')->default(FoodType::VEG);
                $table->string('status')->default(Status::INACTIVE);
                $table->string('seo')->nullable();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(DBTables::MENUS);
    }
};
