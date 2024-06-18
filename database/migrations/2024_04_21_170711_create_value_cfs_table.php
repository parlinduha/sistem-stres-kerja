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
        Schema::create('value_cfs', function (Blueprint $table) {
            $table->id();
            $table->char('code_sickness');
            $table->char('code_indication');
            $table->float('mb')->nullable();
            $table->float('md')->nullable();

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('value_cfs');
    }
};
