<?php

use App\Constants\DBTables;
use App\Enums\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            DBTables::ADMINS,
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('profile')->nullable();
                $table->string('contact')->nullable();
                $table->string('address')->nullable();
                $table->string('status')->default(Status::INACTIVE);
                $table->rememberToken();
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists(DBTables::ADMINS);
    }
};
