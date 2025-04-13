<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Session;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\ResgisterRequest;

class AuthencationController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function postLogin(UserLoginRequest $req)
    {
        // Validate:
        // $req->validate([
        //     'email'=>'required|email|exists:users,email', 
        //     'password'=>'required|string|min:8'
        // ],[
        //     // Chuyển sang tiếng việt
        //     'email.required'=>"Không được để trống email",
        //     'email.email'=>"Email không đúng định dạng",
        //     'email.exists'=>"Email chưa được đăng kí",
        //     'password.required'=>"Không được để trống password",
        //     'password.string'=>"Password không phải là chuỗi",
        //     'password.min'=>"Password phải dài hơn 8 ký tự"
        // ]);


        $dataUerLogin = [
            'email' => $req->email,
            'password' => $req->password,
        ];
        $remember = $req->has('remember');
        if (Auth::attempt($dataUerLogin, $remember)) {
            // Logout hết các tài khoản khác
            Session::where('user_id',Auth::id())->delete();
            // Tạo phiên đăng nhập mới:
            session()->put('user_id',Auth::id());
            // đăng nhập thành công
            // kiểm tra phân quyền
            if (Auth::user()->role == 'Admin') {
                return redirect()->route('admin.home')->with([
                    'msg' => 'Đăng nhập thành công!'
                ]);
            } // trả lại thông tin của user đã đăng nhập thành công
            else {
                // Đăng nhập vào user
                return redirect()->route('client.home');
            }
        } else {
            // Đăng nhập thất bại
            return redirect()->back()->with([
                'msg' => 'Email hoặc password không đúng!'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout(); // Xóa thông tin đăng nhập
        return redirect()->route('login')->with([
            'msg' => 'Đăng xuất thành công'
        ]);
    }

    public function register()
    {
        return view('register');
    }
    public function postRegister(ResgisterRequest $req)
    {
        $check = User::where('email', $req->email)->exists();
        if ($check) {
            return redirect()->back()->with([
                'msg' => 'Tài khoản email đã tồn tại'
            ]);
        } else {
            $data = [
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password)
            ];

            $newUser = User::create($data);

            // Auth::login($newUser); // Tự động đăng nhập cho user này
            // return view('client.home');

            return redirect()->back()->with([
                'msg' => 'Đăng ký thành công. Vui lòng đăng nhập'
            ]);
        }
    }
}
