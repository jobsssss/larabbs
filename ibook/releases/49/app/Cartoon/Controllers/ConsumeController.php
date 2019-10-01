<?php
/**
 * Created by PhpStorm.
 * User: zengrui
 */

namespace App\Cartoon\Controllers;


use App\Http\Controllers\Controller;


class ConsumeController extends Controller
{
    public function record()
    {

        return view('cartoon.consume.record');
    }
}