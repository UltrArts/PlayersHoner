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
        Schema::create('accounts', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('account_number')->unique();
            $table->string('account_nib');
            $table->decimal('balance', 10, 2)->default(0.00);
            $table->boolean('is_available')->default(true);
            $table->decimal('tax_value', 5, 2)->nullable();
            $table->unsignedBigInteger('id_tax_type');
            $table->decimal('tax_value', 5, 2)->nullable();
            $table->unsignedBigInteger('id_tax_type');
            $table->unsignedBigInteger('id_bank');
            $table->unsignedBigInteger('id_player');
            $table->timestamps();

            $table->foreign('id_bank')->references('id')->on('banks')->onDelete('cascade');
            $table->foreign('id_player')->references('id')->on('players')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropForeign(['id_bank']);
            $table->dropForeign(['id_player']);
            $table->dropForeign(['id_tax_type']);

        });
        Schema::dropIfExists('accounts');
    }
};
