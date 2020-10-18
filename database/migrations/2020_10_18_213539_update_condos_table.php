<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCondosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('condos', function (Blueprint $table) {
            //
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('floor')->nullable();
            $table->string('direction')->nullable();
            $table->string('expense')->nullable();
            $table->string('fix')->nullable();
            $table->string('plan_image_path')->nullable();
            $table->string('image1_path')->nullable();
            $table->string('image2_path')->nullable();
            $table->string('image3_path')->nullable();
            $table->string('image4_path')->nullable();
            $table->string('image5_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('condos', function (Blueprint $table) {
            //
        });
    }
}
