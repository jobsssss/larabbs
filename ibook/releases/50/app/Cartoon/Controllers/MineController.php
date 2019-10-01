<?php
/**
 * User: zengrui
 * Date: 2019-07-27
 * Time: 14:22
 */

namespace App\Cartoon\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Cartoon;

class MineController extends Controller
{
    public function index()
    {

        return view('cartoon.mine.index');
    }
}