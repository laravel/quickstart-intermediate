<?php
/**
 * Created by PhpStorm.
 * User: Werewolflsp
 * Date: 16/3/29
 * Time: 23:19
 */

namespace App\Repositories;

use App\EdInfo;

class EdInfoRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param
     * @return Collection
     */
    public function getAll()
    {
        return EdInfo::all();
    }
}