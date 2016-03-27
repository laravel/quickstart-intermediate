<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('ed_infos');

        Schema::create('ed_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ed_id', 50);
            $table->string('pmt_id', 50);
            $table->string('operator', 50);
            $table->dateTime('test_time');
            $table->char('raw_data_path', 100)->nullable();
            $table->char('test_ambient_path', 100)->nullable();
            $table->float('detection_efficiency')->nullable();
            $table->char('detail_detection_efficiency_path', 100)->nullable();
            $table->float('system_resolution')->nullable();
            $table->float('ed_tts')->nullable();
            $table->float('energy_resolution')->nullable();
            $table->float('relative_energy_resolution')->nullable();
            $table->float('single_muon_charge')->nullable();
            $table->char('test_result_info_path_1', 100)->nullable();
            $table->char('test_result_info_path_2', 100)->nullable();
            $table->char('test_result_info_path_3', 100)->nullable();
            $table->char('test_result_info_path_4', 100)->nullable();
            $table->char('test_result_info_path_5', 100)->nullable();
            $table->char('test_result_pdf_path', 100)->nullable();
            $table->char('figure_1_path', 100)->nullable();
            $table->char('figure_2_path', 100)->nullable();
            $table->char('figure_3_path', 100)->nullable();
            $table->char('figure_4_path', 100)->nullable();
            $table->char('figure_5_path', 100)->nullable();
            $table->char('figure_6_path', 100)->nullable();
            $table->char('figure_7_path', 100)->nullable();
            $table->char('figure_8_path', 100)->nullable();
            $table->char('figure_9_path', 100)->nullable();
            $table->char('figure_10_path', 100)->nullable();
            $table->char('figure_11_path', 100)->nullable();
            $table->char('figure_12_path', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ed_infos');
    }
}
