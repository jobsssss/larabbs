<?php
/**
 * User: zengrui
 */

namespace App\Cartoon\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Collect;
use Illuminate\Support\Facades\Auth;


class CollectController extends Controller
{
    protected $model;

    public function __construct(Collect $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $user                  = Auth::user();
        $infos                 = $this->model->query()
            ->where('user_id', $user->id)
            ->orderBy('updated_at', 'desc')
            ->with(['cartoon'])
            ->get();
        $responseInfo['infos'] = $infos;
        return view('cartoon.collect.collect', $responseInfo);
    }

    public function create()
    {
        $bookId = request()->input('bookId');
        $user   = Auth::user();

        $data      = [
            'user_id'    => $user->id,
            'cartoon_id' => $bookId,
        ];
        $isCollect = $this->model->query()->where($data)->count();

        if ($isCollect) {
            return response()->json(['code' => 200, 'msg' => '已收藏']);
        }
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->model->query()->insert($data);
        return response()->json(['code' => 200, 'msg' => '已收藏']);
    }
}