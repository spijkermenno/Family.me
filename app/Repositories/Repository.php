<?php

/**
 * Class Repository
 * @package App\Repositories
 */

namespace App\Repositories;

use Illuminate\Support\Collection;

class Repository
{
    protected function Handle(Collection $collection)
    {
        $CollectionArray = [];
        foreach ($collection as $key => $item) {
            array_push($CollectionArray, $item);
        }
        return $CollectionArray;
    }
}
