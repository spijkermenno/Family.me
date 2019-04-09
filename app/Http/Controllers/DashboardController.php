<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $familyMembers = DB::table('family_members')->where('family_id', Auth::id())->get();

        return view('dashboard',[
            'familyMembers' => $familyMembers
        ]);
    }
}
