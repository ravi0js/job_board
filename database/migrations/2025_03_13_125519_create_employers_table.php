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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');  // Fixed typo here
            $table->foreignIdFor(\App\Models\User::class)->nullable()->cascadeOnDelete();
            $table->timestamps();
        });

        // Fixed Schema typo here
        Schema::table('jobs', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Employer::class)->constrained()->cascadeOnDelete();
            // Ensuring the foreign key points to the correct table and applies the cascade on delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
