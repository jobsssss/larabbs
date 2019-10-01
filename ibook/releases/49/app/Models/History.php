<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\History
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property int $cartoon_id 漫画id
 * @property int $chapter_id 章ID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cartoon $cartoon
 * @property-read \App\Models\Chapter $chapter
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History whereCartoonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History whereChapterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History whereUserId($value)
 * @mixin \Eloquent
 */
class History extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cartoon()
    {
        return $this->belongsTo(Cartoon::class, 'cartoon_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id', 'id');
    }
}
