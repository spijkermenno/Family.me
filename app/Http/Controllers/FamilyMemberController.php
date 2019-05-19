<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function save(Request $request)
    {
        $this->FamilyId = Auth::id();
        $id = $request->input('id');

        if ($this->isMemberOfFamily($id, $this->FamilyId)) {
            $request->session()->put('FamilyMemberId', $id);
        } else {
            return abort(500);
        }

        return redirect()->route('dashboard');
    }

    public function select()
    {
        $this->FamilyId = Auth::id();

        return view('auth.selectFamilyMember', [
            'familyMembers' => $this->DatabaseFamilyMemberRepository->getByFamilyIdWithImages($this->FamilyId)
        ]);
    }

    public function manage(Request $request)
    {
        $id = $request->input('id');
        $this->FamilyId = Auth::id();

        if (!$this->isMemberOfFamily($id, $this->FamilyId)) {
            return abort(300, trans('auth.userNotMemberOfFamily'));
        }

        $familyMember = $this->DatabaseFamilyMemberRepository->getByIdWithImage($id);
        return view('auth.manageFamilyMember', [
            'familyMember' => $familyMember,
            'roles' => $this->getRoles($familyMember->role)
        ]);
    }

    public function process(Request $request)
    {
        $this->FamilyId = Auth::id();

        if (!$this->isMemberOfFamily($request->get('familyMemberId'), $this->FamilyId)) {
            return abort(300, trans('auth.userNotMemberOfFamily'));
        }

        $this->DatabaseFamilyMemberRepository->editFamilyMemberById($request->get('familyMemberId'), $request->all());

        if ($request->file('userImage')) {
            $path = $request->file('userImage')->store('userImages');

            $this->DatabaseFamilyMemberRepository->addFamilyMemberImage($request->get('familyMemberId'), $path);
        }

        return redirect()->route('selectFamilyMember');
    }

    private function isMemberOfFamily($memberId, $familyId)
    {
        $isMember = false;
        $familyMemberIds = $this->DatabaseFamilyMemberRepository->getIdsByFamilyId($familyId);

        foreach ($familyMemberIds as $familyMemberId) {
            if ($familyMemberId->id == $memberId) {
                $isMember = true;
            }
        }

        return $isMember;
    }

    private function getRoles($familyMemberRole)
    {
        $roles = [
            ['translationText' => 'dictionary.father', 'value' => 'father', 'active' => false],
            ['translationText' => 'dictionary.mother', 'value' => 'mother', 'active' => false],
            ['translationText' => 'dictionary.daughter', 'value' => 'daughter', 'active' => false],
            ['translationText' => 'dictionary.granddaughter', 'value' => 'granddaughter', 'active' => false],
            ['translationText' => 'dictionary.son', 'value' => 'son', 'active' => false],
            ['translationText' => 'dictionary.grandson', 'value' => 'grandson', 'active' => false],
            ['translationText' => 'dictionary.grandma', 'value' => 'grandma', 'active' => false],
            ['translationText' => 'dictionary.grandpa', 'value' => 'grandpa', 'active' => false],
            ['translationText' => 'dictionary.uncle', 'value' => 'uncle', 'active' => false],
            ['translationText' => 'dictionary.aunt', 'value' => 'aunt', 'active' => false]
        ];

        if ($familyMemberRole == '') {
            return $roles;
        }

        foreach ($roles as $key => $role) {
            if ($role['value'] == $familyMemberRole) {
                $roles[$key]['active'] = true;
            }
        }

        return $roles;
    }
}
