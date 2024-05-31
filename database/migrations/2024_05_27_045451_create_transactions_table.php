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
        Schema::create('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->decimal('value', 10, 2);
            $table->unsignedBigInteger('id_account');
            $table->unsignedBigInteger('id_transaction_type');
            $table->timestamps();

            $table->foreign('id_account')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('id_transaction_type')->references('id')->on('transaction_types')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['id_account']);
            $table->dropForeign(['id_transaction_type']);
        });
        Schema::dropIfExists('transactions');
    }
};
