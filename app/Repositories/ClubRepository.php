<?php

namespace App\Repositories;

use App\Models\Club;
use App\Repositories\BaseRepository;

/**
 * Class ClubRepository
 * @package App\Repositories
 * @version August 13, 2021, 4:12 pm UTC
*/

class ClubRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'country_id',
        'state_id',
        'city',
        'email'
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
        return Club::class;
    }
}
