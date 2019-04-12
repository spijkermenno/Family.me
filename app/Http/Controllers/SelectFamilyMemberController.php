<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\DatabaseFamilyRepository;
use App\Repositories\DatabaseFamilyMemberRepository;

class SelectFamilyMemberController extends Controller
{
    private $DatabaseFamilyRepository;
    private $DatabaseFamilyMemberRepository;
    private $FamilyId;

    public function __construct()
    {
        $this->DatabaseFamilyRepository = new DatabaseFamilyRepository();
        $this->DatabaseFamilyMemberRepository = new DatabaseFamilyMemberRepository();
    }

    private function getFamilyMembers()
    {
        return $this->DatabaseFamilyMemberRepository->getByFamilyId($this->FamilyId);
    }

    public function index()
    {
        $this->FamilyId = Auth::id();

        return view('auth.selectFamilyMember', [
            'familyMembers' => $this->getFamilyMembers()
        ]);
    }
}
