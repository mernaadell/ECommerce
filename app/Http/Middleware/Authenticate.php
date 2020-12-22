<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {//auth aw la
            if (Request::is('admin/*')) //lw ktab admin l awal kda hwa admin
                return route('admin.login');
            else
                return route('login');//user ay page ana 3wzaha

        }
        //lw auth mesh htwdek fe mkan htdal mkank
    }
}
