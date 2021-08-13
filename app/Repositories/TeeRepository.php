<?php

namespace App\Repositories;

use App\Models\Tee;
use App\Repositories\BaseRepository;

/**
 * Class TeeRepository
 * @package App\Repositories
 * @version August 13, 2021, 4:40 pm UTC
*/

class TeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'enabled',
        'course_id',
        'gender',
        'teecolor_id',
        'slope',
        'rating'
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
        return Tee::class;
    }
}
