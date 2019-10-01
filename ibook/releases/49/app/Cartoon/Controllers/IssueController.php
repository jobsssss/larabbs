<?php
/**
 * Created by PhpStorm.
 * User: zengrui
 */

namespace App\Cartoon\Controllers;


use App\Http\Controllers\Controller;


class IssueController extends Controller
{
    public function showForm()
    {

        return view('cartoon.issue.form');
    }
}