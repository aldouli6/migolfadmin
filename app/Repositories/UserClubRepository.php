<?php

namespace App\Repositories;

use App\Models\UserClub;
use App\Repositories\BaseRepository;

/**
 * Class UserClubRepository
 * @package App\Repositories
 * @version August 7, 2021, 7:17 pm UTC
*/

class UserClubRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'club_id',
        'clasification'
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
