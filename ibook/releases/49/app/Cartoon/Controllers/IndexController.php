<?php
/**
 * Created by PhpStorm.
 * User: zengrui
 * Date: 2019-07-27
 * Time: 14:22
 */

namespace App\Cartoon\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Cartoon;

class IndexController extends Controller
{
    public function index()
    {
        $selects   = ['id', 'title', 'cover', 'intro'];
        $carousels = Cartoon::query()
            ->select($selects)
            ->where('is_carousel', 1)
            ->where('status','PUT_AWAY')
            ->orderBy('order')
            ->orderBy('visit','desc')
            ->orderBy('updated_at', 'desc')
            ->get();

        $excellentCartoons = Cartoon::query()
            ->select($selects)
            ->where('is_excellent', 1)
            ->where('status','PUT_AWAY')
            ->limit(6)
            ->orderBy('order')
            ->orderBy('visit','desc')
            ->orderBy('updated_at', 'desc')
            ->get();

        $freeCartoons = Cartoon::query()
            ->select($selects)
            ->where('is_free', 1)
            ->where('status','PUT_AWAY')
            ->limit(6)
            ->orderBy('order')
            ->orderBy('visit','desc')
            ->orderBy('updated_at', 'desc')
            ->get();

        $noFinishedCartoons = Cartoon::query()->select($selects)
            ->where('is_finished', 0)
            ->where('status','PUT_AWAY')
            ->limit(6)
            ->orderBy('order')
            ->orderBy('visit','desc')
            ->orderBy('updated_at', 'desc')
            ->get();

        $finishedCartoons = Cartoon::query()->select($selects)
            ->where('is_finished', 1)
            ->where('status','PUT_AWAY')
            ->limit(6)
            ->orderBy('order')
            ->orderBy('visit','desc')
            ->orderBy('updated_at', 'desc')
            ->get();

        $ranks = Cartoon::query()->select($selects)
            ->where('status','PUT_AWAY')
            ->limit(6)
            ->orderBy('order')
            ->orderBy('visit','desc')
            ->orderBy('updated_at', 'desc')
            ->get();

        $data = [
            'carousels'          => $carousels,
            'excellentCartoons'  => $excellentCartoons,
            'freeCartoons'       => $freeCartoons,
            'noFinishedCartoons' => $noFinishedCartoons,
            'finishedCartoons'   => $finishedCartoons,
            'ranks'              => $ranks,
        ];
        return view('cartoon.index', $data);
    }
}