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
        Schema::create('players', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('name');
            $table->string('last_name');
            $table->string('tel');
            $table->string('tel2')->nullable();
            $table->date('birth');
            $table->string('email')->nullable()->unique();
            $table->boolean('is_retired')->default(false);
            $table->boolean('is_available')->default(true);
            $table->boolean('is_pre_register')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->date('retirement_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('players', function (Blueprint $table) {
            $table->dropForeign(['user_id']);

        });

        Schema::dropIfExists('players');
    }
};
