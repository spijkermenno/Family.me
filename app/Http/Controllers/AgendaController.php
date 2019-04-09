<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('agenda', [
            "user" => $user
        ]);
    }
}
