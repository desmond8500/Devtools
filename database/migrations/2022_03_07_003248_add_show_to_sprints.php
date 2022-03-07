<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShowToSprints extends Migration
{
    public function up()
    {
        Schema::table('sprints', function (Blueprint $table) {
            $table->boolean('show')->default(1);
            $table->boolean('status')->default(0);
        });
    }

    public function down()
    {
        Schema::table('sprints', function (Blueprint $table) {
            //
        });
    }
}
