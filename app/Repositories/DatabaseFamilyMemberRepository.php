<?php

namespace App\Repositories;

/**
 * Class DatabaseItemRepository
 * @package App\Repositories
 */

use Illuminate\Support\Facades\DB as Database;
use App\Repositories\Contracts\FamilyMemberRepository;

class DatabaseFamilyMemberRepository extends Repository implements FamilyMemberRepository
{
    public function getAll()
    {
        return $this->Handle(Database::table('family_members')->get());
    }

    public function getById(int $id)
    {
        return Database::table('family_members')->where('id', $id)->get();
    }

    public function getByFamilyId(int $id)
    {
        return Database::table('family_members')->where('family_id', $id)->get();
    }
}
