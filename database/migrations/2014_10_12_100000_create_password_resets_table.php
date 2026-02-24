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
            DBTables::PASSWORD_RESETS,
            function (Blueprint $table) {
                $table->string('email')->index();
                $table->string('token');
                $table->timestamp('created_at')->nullable();
            }
        );

        Schema::create(
            DBTables::ADMINS_PASSWORD_RESETS,
            function (Blueprint $table) {
                $table->string('email')->index();
                $table->string('token');
                $table->timestamp('created_at')->nullable();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists(DBTables::PASSWORD_RESETS);
        Schema::dropIfExists(DBTables::ADMINS_PASSWORD_RESETS);
    }
};
