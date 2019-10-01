<?php
/**
 * User: zengrui
 */

namespace App\Cartoon\Controllers;


use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Support\Facades\Auth;


class HistoryController extends Controller
{
    protected $history;

    public function __construct(History $history)
    {
        $this->history = $history;
    }

    public function history()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $user = Auth::user();
        $histories = $this->history->query()
            ->where('user_id',$user->id)
            ->orderBy('updated_at','desc')
            ->with(['cartoon'])
            ->get();
        $responseInfo['histories'] = $histories;
        return view('cartoon.history.history',$responseInfo);
    }
}