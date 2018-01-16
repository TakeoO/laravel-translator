<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Translation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translation_source', function (Blueprint $table) {
            $table->increments('translation_source_id');
            $table->string('source');
            $table->string('text-domain')->default("default");
            $table->timestamps();
            $table->softDeletes();


        });

        Schema::create('translation', function (Blueprint $table) {
            $table->increments('translation_id');
            $table->integer('translation_source_id');
            $table->string('translation');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('translation_source');
        Schema::drop('translation');
    }
}
