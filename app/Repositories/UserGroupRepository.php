<?php

namespace App\Repositories;

use App\Models\UserGroup;
use App\Repositories\BaseRepository;

/**
 * Class UserGroupRepository
 * @package App\Repositories
 * @version September 24, 2021, 4:55 pm UTC
*/

class UserGroupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'name',
        'classification',
        'players'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserGroup::class;
    }
}
