<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\DatabaseFamilyRepository;
use App\Repositories\DatabaseFamilyMemberRepository;

class FamilyMemberController extends Controller
{
    private $DatabaseFamilyRepository;
    private $DatabaseFamilyMemberRepository;
    private $FamilyId;

    public function __construct()
    {
        $this->DatabaseFamilyRepository = new DatabaseFamilyRepository();
        $this->DatabaseFamilyMemberRepository = new DatabaseFamilyMemberRepository();
    }

    public function select()
    {
        $this->FamilyId = Auth::id();

        return view('auth.selectFamilyMember', [
            'familyMembers' => $this->DatabaseFamilyMemberRepository->getByFamilyIdWithImages($this->FamilyId)
        ]);
    }

    public function manage($id)
    {
        $this->FamilyId = Auth::id();

        return view('auth.manageFamilyMember', [
            'familyMember' => $this->DatabaseFamilyMemberRepository->getById($id)
        ]);
    }

    private function isMemberOfFamily($memberId, $familyId)
    {
        $isMember = false;
        $familyMemberIds = $this->DatabaseFamilyMemberRepository->getIdsByFamilyId($familyId);

        dd($familyMemberIds);
        foreach ($familyMemberIds as $familyMemberId) {
            if ($familyMemberId == $memberId) {
                $isMember = true;
            }
        }

        return $isMember;
    }
}
