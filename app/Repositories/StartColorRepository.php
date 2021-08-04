<?php

namespace App\Repositories;

use App\Models\StartColor;
use App\Repositories\BaseRepository;

/**
 * Class StartColorRepository
 * @package App\Repositories
 * @version August 3, 2021, 7:14 pm UTC
*/

class StartColorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'icon',
        'leads'
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
        return StartColor::class;
    }
}
