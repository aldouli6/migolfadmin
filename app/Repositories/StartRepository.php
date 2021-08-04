<?php

namespace App\Repositories;

use App\Models\Start;
use App\Repositories\BaseRepository;

/**
 * Class StartRepository
 * @package App\Repositories
 * @version August 3, 2021, 7:28 pm UTC
*/

class StartRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'field_id',
        'gender',
        'default',
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
