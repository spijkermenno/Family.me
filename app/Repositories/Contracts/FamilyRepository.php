<?php

namespace App\Repositories\Contracts;

/**
 * Class DatabaseItemRepository
 * @package App\Repositories
 */

interface FamilyRepository
{
    public function getAll();

    public function getById(int $id);
}
