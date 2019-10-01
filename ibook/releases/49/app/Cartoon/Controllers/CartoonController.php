<?php
/**
 * User: zengrui
 */

namespace App\Cartoon\Controllers;


use App\Cartoon\Service\CartoonService;
use App\Http\Controllers\Controller;
use App\Models\Cartoon;
use function helpers\img_url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartoonController extends Controller
{
    protected $model;
    protected $service;
    protected $selects = ['id', 'title', 'cover', 'intro', 'author', 'tags', 'hot', 'visit'];

    public function __construct(Cartoon $cartoon, CartoonService $service)
    {
        $this->model   = $cartoon;
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $params = [
            'cat' => $request->input('cat')
        ];
        return view('cartoon.cartoon.index', $params);
    }

    /**
     * 异步加载漫画列表
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSection(Request $request)
    {
        $perPage = $request->input('size');
        $params  = [
            'cat' => $request->input('cat')
        ];
        $builder = $this->model->query()
            ->select($this->selects)
            ->where('status', 'PUT_AWAY');


        if ($params['cat'] == '连载') {
            $builder->where('is_finished', 0);
        }
        if ($params['cat'] == '精品推荐') {
            $builder->where('is_excellent', 1);
        }
        if ($params['cat'] == '免费漫画') {
            $builder->where('is_free', 1);
        }

        if ($params['cat'] == '连载漫画') {
            $builder->where('is_finished', 0);
        }

        if ($params['cat'] == '完结漫画') {
            $builder->where('is_finished', 1);
        }

        $infos = $builder
            ->orderBy('order')
            ->orderBy('visit', 'desc')
            ->orderBy('updated_at', 'desc')
            ->paginate($perPage)->items();

        $infos = array_map(function ($v) {
            $v->cover = img_url($v->cover);
            return $v;
        }, $infos);
        return response()->json(['code' => 200, 'data' => ['books' => $infos]]);
    }

    public function detail(Request $request)
    {
        $id = $request->id;
        /**
         * @var Cartoon $info
         */
        $info        = $this->model
            ->query()
            ->where('id', $id)
            ->first($this->selects);
        $info->visit = $info->visit + 1;
        $info->timestamps = false;
        $info->save();
        $info->cover = img_url($info->cover);

        $chapters = $info->chapters()
            ->where('status', 'PUT_AWAY')
            ->get(['id', 'name', 'updated_at', 'price']);

        $todayUpdatedCartoons = $this->model->query()
            ->where('status', 'PUT_AWAY')
            ->orderBy('updated_at')
            ->limit(4)
            ->get($this->selects);

        $recommends = $this->model->query()->orderBy(DB::raw('rand()'))->limit(6)->get($this->selects);

        $renderData = [
            'info'                 => $info,
            'chapters'             => $chapters,
            'todayUpdatedCartoons' => $todayUpdatedCartoons,
            'recommends'           => $recommends,
        ];
        return view('cartoon.cartoon.detail', $renderData);
    }

    public function searchPage()
    {
        $hots = $this->service->getRecommends();

        $renderParams = [
            'hots' => $hots
        ];
        return view('cartoon.cartoon.search_page', $renderParams);
    }

    public function search()
    {
        $params = [
            'title' => request()->input('title')
        ];
        $infos  = $this->model->query()
            ->where('status', 'PUT_AWAY')
            ->where('title', 'like', "%{$params['title']}%")
            ->select($this->selects)
            ->get()
            ->each(function ($item, $key) {
                $item->cover = img_url($item->cover);
                return $item;
            });

        return response()->json(['code' => 200, 'data' => $infos]);
    }

}