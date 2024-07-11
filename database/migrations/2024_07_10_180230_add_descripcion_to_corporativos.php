<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('corporativos', function (Blueprint $table) {
            $table->string('descripcion');
        });
    }

    public function down()
    {
        Schema::table('corporativos', function (Blueprint $table) {
            $table->dropColumn('descripcion');
        });
    }
};
