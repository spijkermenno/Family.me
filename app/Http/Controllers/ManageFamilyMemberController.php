<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\DatabaseFamilyRepository;
use App\Repositories\DatabaseFamilyMemberRepository;

class ManageFamilyMemberController extends Controller
{
    private $DatabaseFamilyRepository;
    private $DatabaseFamilyMemberRepository;
    private $FamilyId;

    public function __construct()
    {
        $this->DatabaseFamilyRepository = new DatabaseFamilyRepository();
        $this->DatabaseFamilyMemberRepository = new DatabaseFamilyMemberRepository();
    }

    public function index()
    {
        $this->FamilyId = Auth::id();

        return view('auth.manageFamilyMembers', [
            'familyMembers' => $this->DatabaseFamilyMemberRepository->getByFamilyIdWithImages($this->FamilyId)
        ]);
    }
}
