<?php

namespace App\Repositories;

use App\Models\BetGreen;
use App\Repositories\BaseRepository;

/**
 * Class BetGreenRepository
 * @package App\Repositories
 * @version October 8, 2021, 5:45 pm UTC
*/

class BetGreenRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bet_id',
        'enabled',
        'bet',
        'condicion1',
        'condicion2'
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
        return BetGreen::class;
    }
}
