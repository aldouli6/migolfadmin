<?php

namespace App\Repositories;

use App\Models\UserHandicapIndex;
use App\Repositories\BaseRepository;

/**
 * Class UserHandicapIndexRepository
 * @package App\Repositories
 * @version August 16, 2021, 4:00 pm UTC
*/

class UserHandicapIndexRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'player_id',
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
        return UserHandicapIndex::class;
    }
}
