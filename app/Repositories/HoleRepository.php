<?php

namespace App\Repositories;

use App\Models\Hole;
use App\Repositories\BaseRepository;

/**
 * Class HoleRepository
 * @package App\Repositories
 * @version February 22, 2022, 6:53 pm UTC
*/

class HoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'hole_number',
        'course_id',
        'par',
        'hole_raiting_male',
        'hole_raiting_female'
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
