<?php

namespace App\Http\Middleware;

use Closure;

class ValidateData
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
        /*if (preg_match('[A-ZÑ&]{3,4}', $request->input('rfc')) == 0) {
            return redirect('/');
        }*/
    }
}
