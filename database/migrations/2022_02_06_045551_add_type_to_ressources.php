<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToRessources extends Migration
{
    public function up()
    {
        Schema::table('ressources', function (Blueprint $table) {
            $table->string('type')->nullable();
        });
    }

    public function down()
    {
        Schema::table('ressources', function (Blueprint $table) {
            //
        });
    }
}
