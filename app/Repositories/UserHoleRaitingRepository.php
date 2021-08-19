<?php

namespace App\Repositories;

use App\Models\UserHoleRaiting;
use App\Repositories\BaseRepository;

/**
 * Class UserHoleRaitingRepository
 * @package App\Repositories
 * @version August 16, 2021, 4:00 pm UTC
*/

class UserHoleRaitingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'player_id',
        'hole_raiting_type',
        'hole_raitinig'
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
        return UserHoleRaiting::class;
    }
}
