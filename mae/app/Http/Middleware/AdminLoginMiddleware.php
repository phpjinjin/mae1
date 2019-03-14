<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         if (session('alogin')) {
            // 执行下一次请求 通过
            return $next($request);
        }else{
            // 跳转到登录页面
            return redirect('admin/login');
        }
    }
}
