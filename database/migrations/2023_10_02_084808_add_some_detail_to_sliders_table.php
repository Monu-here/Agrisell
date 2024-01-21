<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sliders', function (Blueprint $table) {
            // $table->string('btn_text')->nullable();
            // $table->string('btn_padding')->nullable();
            // $table->string('btn_height')->nullable();
            // $table->string('btn_bg_color')->nullable();
            // $table->string('btn_text_color')->nullable();
            // $table->string('btn_border_radius')->nullable();
            // $table->string('btn_position')->nullable();
            // $table->string('other')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sliders', function (Blueprint $table) {
            // $table->dropColumn('btn_text');
            // $table->dropColumn('btn_padding');
            // $table->dropColumn('btn_height');
            // $table->dropColumn('btn_bg_color');
            // $table->dropColumn('btn_text_color');
            // $table->dropColumn('btn_border_radius');
            // $table->dropColumn('btn_position');
            // $table->dropColumn('other');
        });
    }
};
