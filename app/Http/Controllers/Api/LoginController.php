<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //get credentials from request
        $credentials = $request->only('email', 'password');

        //if auth failed
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda salah'
            ], 401);
        }

        //if auth success
        return response()->json([
            'success' => true,
            'user'    => auth()->user(),
            'token'   => $token
        ], 200);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if (empty($user)) {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        } else {
            if (!Hash::check($request->password, $user->password)) {
                return redirect()->back()->with('error', 'Password salah');
            } else {
                $remember = $request->has('remember');

                if ($remember) {
                    // email kesimpen kalo remeber di centang
                    Cookie::queue('email', $request->email, 43200);
                } else {
                    // ini kalo ga di centang
                    Cookie::queue(Cookie::forget('email'));
                }

                Auth::login($user, $remember);
                return redirect()->route('dashboard');
            }
        }
    }

    public function prosesLogout(Request $request)
    {
        try {
            Auth::logout();
            return redirect()->route('login')->with('success', 'Logout Berhasil, Silahkan Login Kembali');
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'message' => 'Logout Gagal',
            ];
            return response()->json($response, 500);
        }
    }
    public function logout(Request $request)
    {
        try {
            auth()->user()->tokens()->delete();
            return response()
                ->json(['success' => true,
                    'message' => 'Thank You.',
                ]);
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'message' => 'Logout Gagal',
            ];
            return response()->json($response, 500);
        }
    }
}
