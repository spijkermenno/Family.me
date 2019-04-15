<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class FillFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('families')->insert(
            [
                'familyname' => 'Spijker',
                'email' => 'spijkermenno@gmail.com',
                'email_verified_at' => '2019-04-15 12:23:10',
                'password' => '$2y$10$uaxcNbsDww8S2HSBb2ae6uITVD.Xp.vzfwcsq5ZRTW2IQBs/rFddq',
                'familysize' => 3,
                'created_at' => '2019-04-15 12:23:05',
                'updated_at' => '2019-04-15 12:23:05'
            ]
        );
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
