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
            $table->decimal('tax_value', 10, 2)->nullable();
            $table->decimal('retirement_amount', 10, 2)->nullable();
            $table->unsignedBigInteger('tax_type_id');
            $table->unsignedBigInteger('bank_id');
            $table->unsignedBigInteger('player_id');
            $table->timestamps();

            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('tax_type_id')->references('id')->on('players')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropForeign(['bank_id']);
            $table->dropForeign(['player_id']);
            $table->dropForeign(['tax_type_id']);

        });
        Schema::dropIfExists('accounts');
    }
};
