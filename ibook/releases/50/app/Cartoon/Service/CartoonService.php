<?php

/**
 * Created by PhpStorm.
 * User: zengrui
 * Date: 2019-08-11
 * Time: 18:12
 */


namespace App\Cartoon\Service;

use App\Models\Cartoon;
use App\Models\CartoonContent;
use App\Models\Chapter;
use function helpers\img_url;
use Illuminate\Support\Facades\DB;

class CartoonService
{
    public $cartoon;
    public $chapter;
    public $content;

    public function __construct(Cartoon $cartoon, Chapter $chapter, CartoonContent $content)
    {
        $this->cartoon = $cartoon;
        $this->chapter = $chapter;
        $this->content = $content;
    }

    public function getRecommends()
    {
        $recommends = $this->cartoon
            ->query()
            ->orderBy(DB::raw('rand()'))->limit(6)->get(['id', 'title', 'cover', 'intro', 'author', 'tags', 'hot']);
        $recommends = $recommends->each(function($item,$key) {
            $item->cover = img_url($item->cover);
            return $item;
        });
        return $recommends;
    }

    public function getNextChapter($chapter)
    {
        $info = $this->chapter->query()
            ->where('cartoon_id',$chapter->cartoon_id)
            ->where('order','>',$chapter->order)
            ->where('status','PUT_AWAY')
            ->orderBy('order')
            ->first(['id','name']);

        return $info;
    }

    public function getPrevChapter($chapter)
    {
        $info = $this->chapter->query()
            ->where('cartoon_id',$chapter->cartoon_id)
            ->where('order','<',$chapter->order)
            ->where('status','PUT_AWAY')
            ->orderBy('order','desc')
            ->first(['id','name']);

        return $info;
    }
}