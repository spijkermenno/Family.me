<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('FamilyMemberId');
        return redirect('/login');
    }

    protected function authenticated(Request $request, $user)
    {
        try {
            $familySize = DB::table('families')->where('id', Auth::id())->get('familysize')[0]->familysize;

            $temp = DB::table('family_members')->where('family_id', Auth::id())->get();
            $familymembers = 0;
            foreach ($temp as $familymember) {
                $familymembers++;
            }
        } catch (\Exception $exception) {
            $familymembers = 0;
            $familySize = 0;
        }

        if ($familymembers > 0 && $familymembers == $familySize) {
            return redirect('/');
        }
        return redirect('RegisterFamilyMembers');
    }
}
