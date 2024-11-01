<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function signup()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'unique:users,username|required',
            'password' => 'required'
        ]);
        DB::beginTransaction();
        try {
            if ($request->organisasi) {
            } else {
                $data = $request->except('_token');
                $data['password'] = Hash::make($data['password']);
                $user = User::create($data);
                RoleUser::create(['user_id' => $user->id, 'role_id' => 1]);
            }
            $response = ['message' => 'User berhasil di buat', 'button' => 'Login'];
            $code = 200;
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $code = 422;
            $response = ['message' => 'User gagal di buat', 'button' => 'Coba Lagi'];
        }
        return response()->json($response, $code);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => "required",
            'password' => 'required'
        ]);
        $response = ['status' => 'Gagal', 'message' => 'kombinasi username dan password tidak terdaftar di aplikasi kita', 'button' => 'Coba lagi'];
        $code = 401;
        $user = User::where(['username' => $request->username, 'valid' => true])->first();
        if (User::where(['username' => $request->username, 'valid' => true])->count() == 1 && Hash::check($request->password, $user->password)) {
            Auth::login($user, $request->has('remember_me') ? true : false);
            $request->session()->regenerate();
            $response = ['status' => 'Berhasil', 'message' => 'kombinasi username dan password ditemukan', 'button' => 'Masuk Aplikasi'];
            $code = 200;
        }
        return response()->json($response, $code);
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();
        return response()->json([], 200);
    }
}
