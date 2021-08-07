<?php

namespace App\Repositories;

use App\Models\Start;
use App\Repositories\BaseRepository;

/**
 * Class StartRepository
 * @package App\Repositories
 * @version August 7, 2021, 6:42 pm UTC
*/

class StartRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'enabled',
        'field_id',
        'gender',
        'startcolor_id',
        'slope',
        'rating',
        'par'
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
        return Start::class;
    }
}
