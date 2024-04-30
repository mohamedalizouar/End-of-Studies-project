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
        Schema::table('commandesdutil', function (Blueprint $table) {
           $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('quantity');
            $table->unsignedBigInteger('cammandes_id');
            $table->foreign('cammandes_id')->references('id')->on('commandes')->onUpdate('CASCADE')->onDelete('CASCADE');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commandesdutil', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
            $table->dropColumn('quantity');
            $table->dropForeign(['cammandes_id']);
            $table->dropColumn('cammandes_id');
        });
    }
};
