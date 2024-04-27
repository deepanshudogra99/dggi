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
        Schema::create('dist_masters', function (Blueprint $table) {
            $table->id();
            $table->string('stcode',3);
            $table->string('dtcode',3);
            $table->string('dtname',50);
            $table->string('dtabbr',3);
            $table->string('dtkey',6);
            $table->string('totaloffices',3)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dist_masters');
    }
};
