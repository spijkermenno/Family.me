<?php

namespace App\Repositories\Contracts;

/**
 * Class DatabaseItemRepository
 * @package App\Repositories
 */

interface FamilyMemberRepository
{
    public function getAll();

    public function getById(int $id);

    public function getByFamilyId(int $id);
}
