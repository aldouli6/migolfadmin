<?php

namespace App\Repositories;

use App\Models\BetStableford;
use App\Repositories\BaseRepository;

/**
 * Class BetStablefordRepository
 * @package App\Repositories
 * @version October 8, 2021, 5:44 pm UTC
*/

class BetStablefordRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bet_id',
        'enabled',
        'bet1_9',
        'bet10_18',
        'bet_total'
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
        return BetStableford::class;
    }
}
