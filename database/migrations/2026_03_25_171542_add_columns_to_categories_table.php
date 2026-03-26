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
        Schema::table('categories', function (Blueprint $table) {
            $table->string('icon')->nullable();
            $table->string('type')->nullable();
            $table->tinyInteger('status')->default(Status::INACTIVE);
            $table->string('link')->nullable();
            $table->integer('order')->default(General::ZERO);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('icon');
            $table->dropColumn('type');
            $table->dropColumn('status');
            $table->dropColumn('order');
        });
    }
};
