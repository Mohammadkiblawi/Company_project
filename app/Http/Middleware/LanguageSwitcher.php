<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class LanguageSwitcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request->session());
        $lang = $request->session()->get('language', 'en');
        if (Auth::user() != null) {

            // حفظ خيار تغيير اللغة
            if (isset($lang)) {
                User::find(Auth::id())->update(['language' => $lang]);
            }

            App::setLocale(Auth::user()->language);
            if (Auth::user()->language == "ar") {
                View::share('rtl', 'true');
            }
        } else if (isset($lang)) {
            App::setLocale($lang);
            if ($lang == "ar") {
                View::share('rtl', 'true');
            }
        }
        return $next($request);
    }
}
