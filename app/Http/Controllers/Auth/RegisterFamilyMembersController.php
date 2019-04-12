<?php

namespace App\Http\Controllers\Auth;

use App\FamilyMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterFamilyMembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'family_id' => ['required', 'int'],
        ]);
    }

    protected function create(array $data)
    {
        return FamilyMember::create([
            'name' => $data['name'],
            'family_id' => $data['family_id']
        ]);
    }

    public function showFamilyMemberForm()
    {
        $message = '';
        try {
            $familySize = DB::table('families')->where('id', Auth::id())->get('familysize')[0]->familysize;

            $temp = DB::table('family_members')->where('family_id', Auth::id())->get();
            $familymembers = 0;
            foreach ($temp as $familymember) {
                $familymembers++;
            }
        } catch (\Exception $exception) {
            $familySize = 0;
        }

        if ($familySize <= 0) {
            abort(500);
        }

        if ($familymembers > 0) {
            $familySize = $familySize - $familymembers;
            $message = 'auth.notAllMembersRegistered';
        }

        return view('auth.registerFamilyMembers', [
            'familySize' => $familySize,
            'message' => $message
        ]);
    }

    public function register(Request $requests)
    {
        foreach ($requests->request->get('familyname') as $request) {
            $request['family_id'] = Auth::id();

            $this->validator($request)->validate();

            $this->create($request);
        }
        return redirect('dashboard');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
