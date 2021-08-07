<?php

namespace App\Repositories;

use App\Models\UserField;
use App\Repositories\BaseRepository;

/**
 * Class UserFieldRepository
 * @package App\Repositories
 * @version August 7, 2021, 7:56 pm UTC
*/

class UserFieldRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'field_id'
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
        return UserField::class;
    }
}
