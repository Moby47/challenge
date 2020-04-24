<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('url');
            $table->string('dare_name');
            $table->integer('likes')->default(0);
            $table->integer('views')->default(0);
            $table->integer('shares')->default(0);
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
        Schema::dropIfExists('dares');
    }
}
