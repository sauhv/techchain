<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response {
        //return $next($request);
        $user = Auth::guard('admin')->user();
        if ($user && $user->vaitro == 1) { 
            
            return $next($request);
        }
        else {
            $request->session()->put('prevurl',url()->current()); // lưu địa chỉ cũ $request->session()->put('prevurl', //url()->current()); lấy địa chỉ ra
            return redirect(url('admin/dangnhap'))
                ->with('thongbao','Bạn cần đăng nhập với vai trò admin');
        }
    }
    
}
