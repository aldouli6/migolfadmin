<?php

namespace App\Repositories;

use App\Models\UserScore;
use App\Repositories\BaseRepository;

/**
 * Class UserScoreRepository
 * @package App\Repositories
 * @version August 13, 2021, 5:54 pm UTC
*/

class UserScoreRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'player_id',
        'hole_raiting_type',
        'hole_raitinig',
        'handicap_index',
        'ghin'
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
        return UserScore::class;
    }
}
