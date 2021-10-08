<?php

namespace App\Repositories;

use App\Models\BetRompeHandicap;
use App\Repositories\BaseRepository;

/**
 * Class BetRompeHandicapRepository
 * @package App\Repositories
 * @version October 8, 2021, 5:44 pm UTC
*/

class BetRompeHandicapRepository extends BaseRepository
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
        'opcion'
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
        return BetRompeHandicap::class;
    }
}
