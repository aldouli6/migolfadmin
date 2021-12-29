<?php

namespace App\Repositories;

use App\Models\Tee;
use App\Repositories\BaseRepository;

/**
 * Class TeeRepository
 * @package App\Repositories
 * @version November 9, 2021, 7:43 pm UTC
*/

class TeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'enabled',
        'default',
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
