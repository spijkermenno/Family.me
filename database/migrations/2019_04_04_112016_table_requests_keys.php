<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableRequestsKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->foreign('family_id')->references('id')->on('families')->onDelete('cascade');
            $table->foreign('requesting_familymember_id')->references('id')->on('family_members')->onDelete('cascade');
            $table->foreign('answering_familymember_id')->references('id')->on('family_members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
