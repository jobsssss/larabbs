<?php
/**
 * User: zengrui
 */

namespace App\Cartoon\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    protected $user;
    protected $userDetail;

    public function __construct(User $user,UserDetail $userDetail)
    {
        $this->user = $user;
        $this->userDetail = $userDetail;
    }

    public function register(Request $request)
    {
        $params = [
            'name' => $request->input('username'),
            'email' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $oldRecord = $this->user->where('email',$params['email'])->first();
        if ($oldRecord) {
            return response()->json(['code' => 201,'msg' => '该邮箱已注册']);
        }
        $userId = $this->user->query()->insertGetId($params);
        $detail = [
            'user_id' => $userId,
        ];
        $this->userDetail->query()->insert($detail);
        if ($userId) {
            return response()->json(['code' => 200]);
        } else {
            return response()->json(['code' => 500,'msg' => '系统异常，请重新再试']);
        }
    }
}