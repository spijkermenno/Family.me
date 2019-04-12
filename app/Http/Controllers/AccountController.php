<?php

namespace App\Http\Controllers;

use App\Repositories\DatabaseFamilyRepository;
use App\Repositories\DatabaseFamilyMemberRepository;

class AccountController extends Controller
{
    private $DatabaseFamilyRepository;
    private $DatabaseFamilyMemberRepository;

    public function __construct()
    {
        $this->DatabaseFamilyRepository = new DatabaseFamilyRepository();
        $this->DatabaseFamilyMemberRepository = new DatabaseFamilyMemberRepository();
    }

    public function index()
    {
        $Family = $this->DatabaseFamilyRepository->getAll();
        $FamilyMembers = $this->DatabaseFamilyMemberRepository->getAll();
        return view('account.profile', [
            'FamilyMembers' => $FamilyMembers,
            'Family' => $Family
        ]);
    }
}
