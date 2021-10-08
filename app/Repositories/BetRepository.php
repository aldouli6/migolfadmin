<?php

namespace App\Repositories;

use App\Models\Bet;
use App\Repositories\BaseRepository;

/**
 * Class BetRepository
 * @package App\Repositories
 * @version October 7, 2021, 7:34 pm UTC
*/

class BetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'name',
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
        return Bet::class;
    }
}
