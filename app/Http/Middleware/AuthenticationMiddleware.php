<?php

namespace App\Http\Middleware;

use App\Permission\CheckAuthenticateUser;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;

class AuthenticationMiddleware
{
    public $Permission;

    protected $auth;
    protected $route;
    public function __construct(Guard $auth, Route $route) {
        $this->auth = $auth;
        $this->route = $route;
    }

    public function handle(Request $request, Closure $next)
    {
        if(!CheckAuthenticateUser::canAccess($this->route->getActionName(), $this->auth->user())){
            return new Response('<h1 style="font-size: 30px;color:red;">Do not have permission for this route.</h1><p style="font-size: 20px">Please Don\'t try Again.</p>', 403);
        }
        return $next($request);
    }
}
