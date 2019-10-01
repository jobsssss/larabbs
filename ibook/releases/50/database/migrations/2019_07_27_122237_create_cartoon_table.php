<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartoonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartoon', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 50)->comment('标题');
            $table->string('cover', 32)->comment('封面');
            $table->string('tags', 50)->comment('漫画标签，用英文,分隔');
            $table->string('intro', 225)->comment('内容简介');
            $table->integer('hot')->comment('热度值');
            $table->integer('visit')->comment('阅读次数');
            $table->integer('collect')->comment('收藏次数');
            $table->unsignedTinyInteger('is_free')->comment('是否免费，布尔值');
            $table->enum('status',['PUT_AWAY','SOLD_OUT'])->comment('PUT_AWAY:上架；SOLD_OUT:下架');
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
        Schema::dropIfExists('cartoon');
    }
}
