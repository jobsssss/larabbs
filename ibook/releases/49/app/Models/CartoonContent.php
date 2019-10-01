<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CartoonContent
 *
 * @property-read Chapter $chapter
 * @package App\Models
 * @property int $id
 * @property int $chapter_id 章节id
 * @property string $image 图片路径
 * @property int $order 排序
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CartoonContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CartoonContent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CartoonContent query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CartoonContent whereChapterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CartoonContent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CartoonContent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CartoonContent whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CartoonContent whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CartoonContent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CartoonContent extends Model
{
    public function chapter()
    {
        return $this->belongsTo(Chapter::class,'chapter_id','id');
    }
}
