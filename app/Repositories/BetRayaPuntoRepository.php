<?php

namespace App\Repositories;

use App\Models\BetRayaPunto;
use App\Repositories\BaseRepository;

/**
 * Class BetRayaPuntoRepository
 * @package App\Repositories
 * @version October 8, 2021, 5:45 pm UTC
*/

class BetRayaPuntoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bet_id',
        'enabled',
        'bet',
        'birdie',
        'aguila',
        'albatros',
        'hoyo_uno',
        'exceso',
        'mas_golpes',
        'label1',
        'value1',
        'label2',
        'value2',
        'label3',
        'value3',
        'label4',
        'value4'
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
        return BetRayaPunto::class;
    }
}
