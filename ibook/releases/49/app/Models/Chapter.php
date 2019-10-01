<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Chapter
 *
 * @property-read Cartoon $cartoon
 * @property-read CartoonContent $cartoonContent
 * @package App\Models
 * @property int $id
 * @property int $cartoon_id 关联cartoon_id
 * @property string $name 章节名
 * @property int $order 章节排序
 * @property string $status PUT_AWAY:上架；SOLD_OUT:下架
 * @property float $price 售价
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CartoonContent[] $content
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chapter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chapter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chapter query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chapter whereCartoonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chapter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chapter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chapter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chapter whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chapter wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chapter whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chapter whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $need_login 是否需要登陆，布尔值
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chapter whereNeedLogin($value)
 */
class Chapter extends Model
{
    public function cartoon()
    {
        return $this->belongsTo(Cartoon::class, 'cartoon_id', 'id');
    }

    public function content()
    {
        return $this->hasMany(CartoonContent::class, 'chapter_id', 'id');
    }
}
