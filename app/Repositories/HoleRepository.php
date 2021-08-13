<?php

namespace App\Repositories;

use App\Models\Hole;
use App\Repositories\BaseRepository;

/**
 * Class HoleRepository
 * @package App\Repositories
 * @version August 13, 2021, 5:09 pm UTC
*/

class HoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'hole_number',
        'tee_id',
        'par',
        'hole_raiting'
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
        return Hole::class;
    }
}
