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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('command_name');
            $table->enum('status', ['pending', 'resolved', 'delivered'])->default('pending');
            $table->integer('num_command');
            
            // Change 'real' to 'double' or 'float' depending on your requirements
            $table->double('totale');
            
            $table->timestamps();

            // Use foreignId to automatically create a foreign key constraint
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
