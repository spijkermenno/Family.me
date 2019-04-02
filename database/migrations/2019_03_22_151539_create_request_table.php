<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('requests', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('family_id')->unsigned();
            $table->bigInteger('requesting_familymember_id')->unsigned();
            $table->bigInteger('answering_familymember_id')->unsigned();
            $table->string('request_content');
            $table->boolean('answer')->nullable(true);
            $table->timestamps();
        });

        Schema::table('requests', function ($table) {
            $table->foreign('family_id')->reference('id')->on('families');
            $table->foreign('requesting_familymember_id')->reference('familymember')->on('id');
            $table->foreign('answering_familymember_id')->reference('familymember')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
