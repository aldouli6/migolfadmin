<?php

namespace App\Repositories;

use App\Models\UserPlayer;
use App\Repositories\BaseRepository;

/**
 * Class UserPlayerRepository
 * @package App\Repositories
 * @version September 20, 2021, 5:34 pm UTC
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
        'tee_color_id'
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
