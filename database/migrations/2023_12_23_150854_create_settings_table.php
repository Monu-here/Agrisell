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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('nameplaceholder')->nullable();
            $table->text('number')->nullable();
            $table->text('numberplaceholder')->nullable();
            $table->text('address')->nullable();
            $table->text('addressplaceholder')->nullable();
            $table->text('qtyy')->nullable();
            $table->text('qtyyplaceholder')->nullable();
            $table->text('btn')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
