<?php

namespace App\Repositories;

use App\Models\CourseTeeDefault;
use App\Repositories\BaseRepository;

/**
 * Class CourseTeeDefaultRepository
 * @package App\Repositories
 * @version August 13, 2021, 5:03 pm UTC
*/

class CourseTeeDefaultRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'course_id',
        'gender',
        'tee_id'
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
        return CourseTeeDefault::class;
    }
}
