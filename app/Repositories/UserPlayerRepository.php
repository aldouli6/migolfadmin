<?php

namespace App\Repositories;

use App\Models\UserPlayer;
use App\Repositories\BaseRepository;

/**
 * Class UserPlayerRepository
 * @package App\Repositories
 * @version August 7, 2021, 7:43 pm UTC
*/

class UserPlayerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'player_id',
        'frequency',
        'field_id',
        'start_id'
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
        return UserPlayer::class;
    }
}
