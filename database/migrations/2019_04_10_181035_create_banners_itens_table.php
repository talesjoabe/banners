<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_itens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('banner_id')->unsigned();
            $table->string('name');
            $table->string('filename');
            $table->integer('seconds')->unsigned();
            $table->timestamps();

            $table->foreign('banner_id')->references('id')->on('banners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banner_itens', function (Blueprint $table) {
            $table->dropForeign(['banner_id']);
        });

        Schema::dropIfExists('banner_itens');
    }
}
