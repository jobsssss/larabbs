<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsExcellentToCartoonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cartoon', function (Blueprint $table) {
            //
            $table->tinyInteger('is_excellent')
                ->after('is_carousel')
                ->default(0)
                ->comment('是否精品');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cartoon', function (Blueprint $table) {
            //
        });
    }
}
