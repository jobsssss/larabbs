<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateIsFreeToCartoonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('cartoon');
        Schema::create('cartoon', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 50)->default('')->comment('标题');
            $table->string('author',15)->default('')->comment('作者');
            $table->string('cover', 32)->default('')->comment('封面');
            $table->string('tags', 50)->default('')->comment('漫画标签，用英文,分隔');
            $table->string('intro', 225)->default('')->comment('内容简介');
            $table->integer('hot')->default(0)->comment('热度值');
            $table->integer('visit')->default(0)->comment('阅读次数');
            $table->integer('collect')->default(0)->comment('收藏次数');
            $table->unsignedTinyInteger('is_free')->default(0)->comment('是否免费，布尔值');
            $table->enum('status',['PUT_AWAY','SOLD_OUT'])->default('PUT_AWAY')->comment('PUT_AWAY:上架；SOLD_OUT:下架');
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
        Schema::table('cartoon', function (Blueprint $table) {
            //
        });
    }
}
