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
        schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('product_name');
            $table->string('product_file');
            $table->string('product_description');
            $table->string('type_of_fillament');
            $table->string('color');
            $table->string('prefered_printer');
            $table->string('support_type')->nullable();
            $table->integer('infill_density')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('orders');
    }
};
