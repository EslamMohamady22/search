<?php

namespace App\Http\Middleware;

use App\Models\Attendance;
use Closure;
use Illuminate\Session\Store;

use Illuminate\Support\Facades\Auth;
use Session;

class SessionExpired {
    protected $session;
    protected $timeout = 220;
    public function __construct(Store $session){
        $this->session = $session;
    }
    public function handle($request, Closure $next){

        $isLoggedIn = $request->path() != '/logout';
        if(! session('lastActivityTime'))
            $this->session->put('lastActivityTime', time());
        elseif(time() - $this->session->get('lastActivityTime') > $this->timeout){
            // if(!$isLoggedIn)
            // {
            //     if(Auth::user()->usertype == 1)
            //     {
            //         $this->timeout = 550;
            //     }
            //     else
            //     {
            //         $this->timeout = 55;
            //     }
            // }

            $this->session->forget('lastActivityTime');
            $cookie = cookie('intend', $isLoggedIn ? url()->current() : '/login');
            $store_logout =  Attendance::where('user_id',Auth::id())->where('logout_time',null)->first();
            if($store_logout)
            {
                $store_logout->logout_time = now();
                $store_logout->update();
            }
            auth()->logout();

        }
        $isLoggedIn ? $this->session->put('lastActivityTime', time()) : $this->session->forget('lastActivityTime');
        return $next($request);
    }
}
