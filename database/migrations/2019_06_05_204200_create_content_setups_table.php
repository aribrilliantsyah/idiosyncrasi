<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_setups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_web');
            $table->string('logo')->nullable();;
            $table->string('ukuran_logo');
            $table->string('email');
            $table->string('no_tlp');
            $table->text('alamat');
            $table->string('website');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('about');
            $table->string('lat');
            $table->string('lng');
            $table->string('lokasi');
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('content_setups');
    }
}
