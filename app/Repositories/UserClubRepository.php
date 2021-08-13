<?php

namespace App\Repositories;

use App\Models\UserClub;
use App\Repositories\BaseRepository;

/**
 * Class UserClubRepository
 * @package App\Repositories
 * @version August 13, 2021, 5:14 pm UTC
*/

class UserClubRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'club_id',
        'classification'
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
        return UserClub::class;
    }
}
