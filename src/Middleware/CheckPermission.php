<?php
namespace Pawan\RolesPerm\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pawan\RolesPerm\Traits\HasGroupAndPerrmission;
class CheckPermission
{
    public function handle(Request $request, Closure $next, $codename)
    {
        [$key,$code]=explode(":",$codename);
        $userModel = config('rolesperm.user_model');
        $user = Auth::user();
        if (!$user || !($user instanceof $userModel)) {
            abort(403, 'Unauthorized - Invalid User Model');
        }
        
        if (!call_user_func([$user,'hasGroupAndPerrmission'],$code)) {
            abort(403, 'Unauthorized - Missing Permission: ' . $codename);
        }
        
        return $next($request);
    }
}
