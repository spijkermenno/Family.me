<?php

namespace App\Http\Middleware;

use Closure;

class familyMemberSelected
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
        $familyMember = $request->session()->get('FamilyMemberId', function () {
            return false;
        });


        if (!$familyMember) {
            return redirect()->route('SelectFamilyMember');
        }

        return $next($request);
    }
}
