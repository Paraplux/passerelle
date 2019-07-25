<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up() 
    {
        Schema::create('keywords', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('survol');
            $table->text('clique');
            $table->string('thumb');
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
        Schema::dropIfExists('keywords');
    }
}
