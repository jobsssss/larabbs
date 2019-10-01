<?php
/**
 * Created by PhpStorm.
 * User: zengrui
 */

namespace App\Cartoon\Controllers;


use App\Http\Controllers\Controller;


class ChargeController extends Controller
{
    public function index()
    {

        return view('cartoon.charge.index');
    }
}