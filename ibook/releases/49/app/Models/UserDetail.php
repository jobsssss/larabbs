<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\UserDetail
 *
 * @property int $user_id 用户id
 * @property int $book_icon 书币
 * @property int $is_svip 是否会员
 * @property int|null $svip_expired_at 会员到期时间
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereBookIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereIsSvip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereSvipExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereUserId($value)
 * @mixin \Eloquent
 */
class UserDetail extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','user_id');
    }
}
