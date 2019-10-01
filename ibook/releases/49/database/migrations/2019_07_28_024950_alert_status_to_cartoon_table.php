<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertStatusToCartoonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "ALTER TABLE cartoon MODIFY COLUMN status VARCHAR(25) NOT NULL DEFAULT '' COMMENT 'PUT_AWAY:上架；SOLD_OUT:下架'";
        \Illuminate\Support\Facades\DB::statement($sql);

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
