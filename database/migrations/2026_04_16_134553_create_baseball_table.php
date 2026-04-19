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
        Schema::create('baseball', function (Blueprint $table) {
            $table->id();
            $table->string('foreign_id');
            $table->string('foreign_team_id');
            $table->string('name');
            $table->string('team');
            $table->text('splits');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baseball');
    }
};
