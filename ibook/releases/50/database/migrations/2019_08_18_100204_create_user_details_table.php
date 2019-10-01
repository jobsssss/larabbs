<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigInteger('user_id')->unique()->comment('用户id');
            $table->integer('book_icon')->default(0)->comment('书币');
            $table->tinyInteger('is_svip')->default(0)->comment('是否会员');
            $table->tinyInteger('svip_expired_at')->nullable()->comment('会员到期时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
