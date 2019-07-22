<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('accueil_thumb')->nullable();
            $table->string('accueil_news_subtitle')->nullable();
            $table->string('accueil_formations_subtitle')->nullable();
            $table->string('formations_thumb')->nullable();
            $table->text('partenaires_text')->nullable();
            $table->text('map_text')->nullable();
            $table->text('contact_text')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('tw_link')->nullable();
            $table->string('li_link')->nullable();
            $table->string('yt_link')->nullable();
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
        Schema::dropIfExists('contenu');
    }
}
