<?php
/**
 * User: zengrui
 */

namespace App\Cartoon\Controllers;


use App\Cartoon\Service\CartoonService;
use App\Http\Controllers\Controller;
use App\Models\Cartoon;
use App\Models\Chapter;
use App\Models\History;
use function helpers\img_url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ChapterController extends Controller
{
    protected $service;
    protected $selects = ['id'];

    public function __construct(CartoonService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {

        $chapterId = $request->chapter_id;
        $cartoonId = $request->cartoon_id;

        $cartoon = $this->service->cartoon->query()
            ->where('id', $cartoonId)
            ->first(['id', 'title', 'intro']);

        $contents = $this->service->content->query()
            ->where('chapter_id', $chapterId)
            ->orderBy('order')
            ->orderBy('id')
            ->get(['id', 'chapter_id', 'image']);

        $contents = $contents->each(function ($item, $key) {
            $item->image = img_url($item->image);
        });

        $recommends = $this->service->getRecommends();

        $chapter = $this->service->chapter
            ->query()
            ->where('id', $chapterId)
            ->first(['id', 'cartoon_id', 'name', 'order', 'need_login']);

        $next = $this->service->getNextChapter($chapter);
        $prev = $this->service->getPrevChapter($chapter);
        $this->updateHistory($cartoon, $chapter);
        $renderParams = [
            'contents'   => $contents,
            'recommends' => $recommends,
            'cartoon'    => $cartoon,
            'chapter'    => $chapter,
            'next'       => $next,
            'prev'       => $prev,
        ];
        return view('cartoon.chapters.index', $renderParams);
    }

    protected function updateHistory(Cartoon $cartoon, Chapter $chapter)
    {
        $user = Auth::user();
        if (!$user) {
            return;
        }
        $history = History::query()
            ->where('user_id', $user->id)
            ->where('cartoon_id', $cartoon->id)
            ->first();

        $data = [
            'user_id'    => $user->id,
            'cartoon_id' => $cartoon->id,
            'chapter_id' => $chapter->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        if (!$history) {
            History::query()->insert($data);
        } else {

            $history->chapter_id = $chapter->id;
            $history->updated_at = date('Y-m-d H:i:s');
            $history->save();
        }
    }
}