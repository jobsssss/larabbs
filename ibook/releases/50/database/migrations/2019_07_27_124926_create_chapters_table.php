<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cartoon_id')->comment('关联cartoon_id');
            $table->string('name', 64)->comment('章节名');
            $table->enum('status',['PUT_AWAY','SOLD_OUT'])->comment('PUT_AWAY:上架；SOLD_OUT:下架');
            $table->decimal('price')->comment('售价');
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
        Schema::dropIfExists('chapters');
    }
}
