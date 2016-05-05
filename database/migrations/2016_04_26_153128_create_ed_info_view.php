<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdInfoView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE VIEW latest_ed_time AS
                        SELECT ed_id as latest_ed, MAX(test_time) as latest_time FROM ed_infos GROUP BY ed_id');
        DB::statement('CREATE VIEW latest_ed_infos AS
                      SELECT ed_infos.* 
                      FROM ed_infos RIGHT JOIN latest_ed_time as latest 
                      ON ed_id = latest_ed AND test_time = latest_time');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW latest_ed_time');
        DB::statement('DROP VIEW latest_ed_infos');
    }
}
