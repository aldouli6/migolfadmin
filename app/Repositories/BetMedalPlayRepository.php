<?php

namespace App\Repositories;

use App\Models\BetMedalPlay;
use App\Repositories\BaseRepository;

/**
 * Class BetMedalPlayRepository
 * @package App\Repositories
 * @version October 8, 2021, 5:44 pm UTC
*/

class BetMedalPlayRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bet_id',
        'enabled',
        'bet1_9',
        'bet10_18',
        'bet_total',
        'empate'
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
        return BetMedalPlay::class;
    }
}
