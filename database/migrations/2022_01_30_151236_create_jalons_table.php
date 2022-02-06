<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJalonsTable extends Migration
{
    public function up()
    {
        Schema::create('jalons', function (Blueprint $table) {
            $table->id();
            $table->string('sprint_id');
            $table->integer('order')->nullable();
            $table->string('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('avancement')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jalons');
    }
}
