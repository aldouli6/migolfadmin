<?php

namespace App\Repositories;

use App\Models\BetMatchIndividual;
use App\Repositories\BaseRepository;

/**
 * Class BetMatchIndividualRepository
 * @package App\Repositories
 * @version October 8, 2021, 5:44 pm UTC
*/

class BetMatchIndividualRepository extends BaseRepository
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
        'press',
        'press_bet',
        'press_every',
        'carrry'
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
        return BetMatchIndividual::class;
    }
}
