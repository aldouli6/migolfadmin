<?php

namespace App\Repositories;

use App\Models\FieldStartDefault;
use App\Repositories\BaseRepository;

/**
 * Class FieldStartDefaultRepository
 * @package App\Repositories
 * @version August 7, 2021, 7:06 pm UTC
*/

class FieldStartDefaultRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'field_id',
        'gender',
        'start_id'
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
        return FieldStartDefault::class;
    }
}
