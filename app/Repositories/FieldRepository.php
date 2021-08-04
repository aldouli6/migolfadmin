<?php

namespace App\Repositories;

use App\Models\Field;
use App\Repositories\BaseRepository;

/**
 * Class FieldRepository
 * @package App\Repositories
 * @version August 3, 2021, 7:12 pm UTC
*/

class FieldRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description',
        'alias',
        'club_id'
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
        return Field::class;
    }
}
