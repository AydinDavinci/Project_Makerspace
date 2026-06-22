<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('item', function (Blueprint $table) {
        $table->id();
        $table->string('item_name');
        $table->string('maker');
        $table->string('datum');
        $table->string('foto')->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('item');
}
};
