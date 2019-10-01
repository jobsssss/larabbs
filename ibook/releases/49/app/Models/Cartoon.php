<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cartoon
 *
 * @property-read Chapter $chapters
 * @package App\Models
 * @property int $id
 * @property string $title 标题
 * @property string $author 作者
 * @property string $cover 封面
 * @property string $tags 漫画标签，用英文,分隔
 * @property string $intro 内容简介
 * @property int $hot 热度值
 * @property int $visit 阅读次数
 * @property int $collect 收藏次数
 * @property int $is_free 是否免费，布尔值
 * @property int $is_carousel 是否轮播
 * @property int $is_excellent 是否精品
 * @property int $is_finished 是否完结
 * @property int $order 排序
 * @property string $status PUT_AWAY:上架；SOLD_OUT:下架
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon whereCollect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon whereHot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon whereIntro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon whereIsCarousel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon whereIsExcellent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon whereIsFinished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon whereIsFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cartoon whereVisit($value)
 * @mixin \Eloquent
 */
class Cartoon extends Model
{
    protected $table = 'cartoon';
    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'cartoon_id', 'id');
    }
}
