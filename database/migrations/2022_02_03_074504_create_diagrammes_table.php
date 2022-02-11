<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagrammesTable extends Migration
{

    public function up()
    {
        Schema::create('diagrammes', function (Blueprint $table) {
            $table->id();
            $table->string('projet_id');
            $table->string('name');
            $table->text('content');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('diagrammes');
    }
}
