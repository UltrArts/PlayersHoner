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
            $table->string('email')->nullable();
            $table->boolean('is_retired')->default(false);
            $table->boolean('is_available')->default(true);
            $table->boolean('is_pre_register')->default(false);
            $table->date('retirement_date')->nullable();
            $table->decimal('retirement_amount', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('id_tax_type')->references('id')->on('tax_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
