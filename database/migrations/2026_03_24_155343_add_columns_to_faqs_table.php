<?php

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
        Schema::table('faqs', function (Blueprint $table) {
            $table->json('metadata')->nullable();
            $table->json('seo')->nullable();
            $table->string('model_id')->nullable();
            $table->string('model_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->dropColumn('metadata');
            $table->dropColumn('seo');
            $table->dropColumn('model_id');
            $table->dropColumn('model_name');
        });
    }
};
