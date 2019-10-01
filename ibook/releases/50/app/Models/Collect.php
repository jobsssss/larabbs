<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Collect
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property int $cartoon_id 漫画id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cartoon $cartoon
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Collect newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Collect newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Collect query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Collect whereCartoonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Collect whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Collect whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Collect whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Collect whereUserId($value)
 * @mixin \Eloquent
 */
class Collect extends Model
{
    public function cartoon()
    {
        return $this->belongsTo(Cartoon::class,'cartoon_id','id');
    }

    public function history()
    {
        return $this->belongsTo(History::class,'cartoon_id','cartoon_id');
    }
}
