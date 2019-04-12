<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class checkFamilyMembers
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
        if (Auth::id() != null) {
            try {
                $temp = DB::table('family_members')->where('family_id', Auth::id())->get('familysize')->get();
                $familymembers = 0;
                foreach ($temp as $familymember) {
                    $familymembers++;
                }
            } catch (\Exception $exception) {
                $familymembers = 0;
            }

            if ($familymembers <= 0) {
                return redirect('RegisterFamilyMembers');
            }
            return $next($request);
        }
        return redirect('login');
    }
}
