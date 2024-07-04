<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/create_ubicacions_table.php
    public function up()
    {
        Schema::create('ubicacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('corporativo_id')->constrained()->onDelete('cascade');
            $table->foreignId('departamento_id')->constrained('departamentos')->onDelete('cascade');
            $table->foreignId('ciudad_id')->constrained('ciudads')->onDelete('cascade');
            $table->string('nombre');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ubicacions');
    }
};
