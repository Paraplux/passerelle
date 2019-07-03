<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('content');
            $table->text('program');
            $table->text('tools');
            $table->text('pre_requisite');
            $table->string('certification');
            $table->date('date_start');
            $table->date('date_end');
            $table->float('duree');
            $table->integer('structure_id');
            $table->integer('keyword_id');
            $table->integer('secteur_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiches');
    }
}
