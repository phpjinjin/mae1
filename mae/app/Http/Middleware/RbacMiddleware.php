<?php

namespace App\Http\Middleware;

use Closure;

class RbacMiddleware
{
    /**
     * @return array
     * 获取控制器和方法名
     */
    public static function getControllerAndFunction()
    {
        $action = \Route::current()->getActionName();
        list($class, $method) = explode('@', $action);
        $class = substr(strrchr($class,'\\'),1);
        return ['controller' => $class, 'method' => $method];
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 获取当前用户的 权限
        $admin_nodes_type = session('admin_nodes_type');
        // 获取当前用户可以访问的 控制器名称
        $keys = array_keys($admin_nodes_type);
        // 获取当前页面的 控制器和方法名称
        $cname_aname = self::getControllerAndFunction();
        $cname = $cname_aname['controller'];
        $aname = $cname_aname['method'];
        // 检查权限
        if(!in_array($cname,$keys)){
            return redirect('403');
        }

        if(!in_array($aname,$admin_nodes_type[$cname])){
            return redirect('403');
        }
        return $next($request);
    }
}
